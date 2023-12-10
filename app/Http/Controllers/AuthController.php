<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $credentials['password'] = bcrypt($credentials['password']);
        $user = User::create($credentials);
        return auth()->attempt($credentials);
    }
    public function viewlogin(Request $request)
    {
       return view('register');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
          

            return response()->json([
                'message' => 'Logged in successfully!',
                'user' => $user,
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid credentials!',
            ], 401);
        }
    }
    public function viewdangnhap(Request $request)
    {
       return view('login');
    }
}
