<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("homepage.home");
    }

    public function viewService($id){
        $data['service'] =Service::findOrFail($id);
        // dd($data['service']['servicefees']);
        return view("homepage.viewService", $data);
    }

    // under process
    public function bookAppointment($slug){
        $data['service'] =Service::where("slug",$slug)->first();
        return view("homepage.book_appointment", $data);
    }


    public function confirmed_appointment(){
        return view("homepage.confirmed_appointment");
    }

    public function myBooking(){
        return view("homepage.myBooking");
    }

    public function aboutPage(){
        return view("homepage.aboutPage");
    }

    public function tandc(){
        return view("homepage.terms&condition");
    }

    public function searchAppointment(){
        return view("homepage.searchAppointment");
    }

}