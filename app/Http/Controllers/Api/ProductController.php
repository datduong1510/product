<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::all();
        return response()->json([
            'data' => ProductResource::collection($products)
        ], 200);
    }
    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $fileName);
            $product->image = 'images/' . $fileName;
        }

        $product->save();

        return response()->json([
            'data' => new ProductResource($product)
        ], 200);
    }
    public function destroy(Request $request, int $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'message' => 'Xóa sản phẩm thành công!',
        ]);
    }
}
