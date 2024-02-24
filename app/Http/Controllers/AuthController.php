<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    public function registerIndex(){

        $user = Auth::user();
        return response()->json($user);
        // try {
        //     $response = User::get();
        //     $data = $response->json();

        //     // You can manipulate the data as needed before returning it
        //     return response()->json($data);
        // } catch (\Exception $e) {
        //     // Handle errors appropriately
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }

    }

    

   

    public function signOut(Request $request)
    {
        Auth::logout();
        // return response()->json(['msg' => 'Logout Successfully'], 201);
        return redirect('/login');
    }


}
