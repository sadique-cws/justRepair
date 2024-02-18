<?php

namespace App\Http\Controllers;

use App\Models\Service;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("homepage.home");
    }

    public function viewService($id){
        $data['service'] =Service::findOrFail($id);
        return view("homepage.viewService", $data);
    }

    // under process
    public function bookAppointment(){
        // $data['service'] =Service::findOrFail($id);
        return view("homepage.book_appointment");
    }

    public function login(){
        return view("homepage.login");
    }

    public function register(){
        return view("homepage.register");
    }

}