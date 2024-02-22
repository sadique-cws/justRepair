<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function registerNew(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'mobile_no' => 'required|min:8|string|max:200',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:20',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function login(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'email' => 'required|string|email|unique:users|max:255',
        //     'password' => 'required|string|min:8|max:20',

        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        // }

        // else{
        //     $user = User::where('email',$request->email)->first();
        //     if($user){
        //         if(Hash::check($request->password,$user->password)){
        //             $request->session()->put('loggedInUser',$user->id);
        //             return response()->json(['message' => 'LogIn Successfully'], 200);
        //         }
        //         else{
        //             return response()->json(['message' => 'Incorrect Email or Password'], 401);
        //         }
        //     }
        //     else{
        //         return response()->json(['message' => 'User Not Found'], 401);
        //     }
            
        // }


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->accessToken;
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout(Request $request)
    {

        Auth::logout();
        // return response()->json(['message' => 'Logout Successfully'], 201);
        return redirect('/login');
    }

    
    public function signIn(){
        return view("homepage.login");
    }
    public function signOut(){
        return view("homepage.home");
    }

    public function register(){
        return view("homepage.register");
    }

    public function profile(){
        return view("homepage.profile");
    }
}
