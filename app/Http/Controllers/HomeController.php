<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("homepage.home");
    }

    public function viewService(){
        return view("homepage.viewService");
    }

}