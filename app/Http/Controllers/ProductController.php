<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $fileName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $fileName);
        $product->image = 'images/' . $fileName;
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();

        return redirect()->route('products.index');
    }
    public function index()
    {
        $products = Product::all();

        return view('home', compact('products'));
    }
    public function update(Request $request, $id)
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

        return redirect()->route('products.index');
    }
    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('update', compact('product'));
    }
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('products.index');
    }
}
