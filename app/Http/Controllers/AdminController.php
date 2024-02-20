<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
class AdminController extends Controller
{
    public function dashboard(){
        $data['count_appointment'] = Appointment::all()->count();
        $data['count_user'] = User::all()->count();
        return view("admin.dashboard", $data);
    }

    public function manageServices(Request $request){   
        return view("admin.manageServices");    
    }
}
 