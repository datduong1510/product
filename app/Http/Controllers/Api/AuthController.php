<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Http\Resources\ProductResource;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('auth_token');

            return response()->json([
                'message' => 'Logged in successfully!',
                'user' => $user,
                'token' => $token->plainTextToken,
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid credentials!',
            ], 401);
        }
    }

}
