<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        return view("admin.services.manage");
    }

    public function insert(){
        return view("admin.services.insert");
    }

    public function view($id){
        $service = Service::where("slug",$id)->first();
        return view("admin.services.view",compact("service"));
    }

    
}
