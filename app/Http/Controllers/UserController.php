<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('admin.user.manage');
    }

    public function show(){
        return view('admin.user.view');
    }
}
