<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    
    public function insert(){
        return view('admin.banner.insert');
    }

    public function index(){
        return view('admin.banner.manage');
    }








}
