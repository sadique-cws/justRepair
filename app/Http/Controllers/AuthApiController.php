<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'mobile_no' => 'required|min:9|string|max:100',
            'email' => 'required|string|email|unique:users|max:100',
            'password' => 'required|string|min:8|max:20',
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(),400);

        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'password' => Hash::make($request->password),
        ]);
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ],201);

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:8|max:20',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }

        if(!$token = auth()->attempt($validator->validated()))
        {
            return response()->json(['error'=>'Unauthorized']);
        }
        
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth()->factory()->getTTL()*60
        ]);
    }

    public function profile()
    {
        return response()->json(auth()->user());
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function signout()
    {
        auth()->logout();

        return response()->json(['message'=>"Logout Successfully"]);
    }
}
