<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = auth('api')->attempt($credentials)) {
            $user = JWTAuth::user(); // Retrieve the authenticated user
            $isAdmin = $user->is_admin; // Assuming 'is_admin' is a column in your users table
            
            return response()->json(compact('token', "isAdmin"));
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    
         
        
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile_no' => $request->input('mobile_no'),
            'password' => bcrypt($request->input('password')),
        ]);

        return response()->json(['message' => 'User registered successfully']);
    }

    public function logout(Request $request)
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'User logged out successfully']);
    }

    public function refreshToken(Request $request)
    {
        $token = JWTAuth::getToken();
        $newToken = JWTAuth::refresh($token);

        return response()->json(['token' => $newToken]);
    }

    public function registerForm(){
        return view("homepage.register");
    }
    
    public function signIn(){
        return view("homepage.login");
    }
    public function signOut(){
        return view("homepage.home");
    }

    public function profile(){
        return view("homepage.profile");
    }
}