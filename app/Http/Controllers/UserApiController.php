<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class UserApiController extends Controller
{
    public function users(){
        try{
            $users = User::all();

            return response()->json($users);
        }catch(\Exception $e){
            Log::error("Error fetching users: " . $e->getMessage());
            return response()->json(['error' => 'Error fetching users'], 500);
        }
    }
}



