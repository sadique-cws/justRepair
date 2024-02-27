<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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

    public function adminLogin(Request $request){

        if($request->isMethod('post')){
            $user = User::where("is_admin" == 1);
            if($user){
                $data = $request->validate([
                    "email" =>"required",
                    "password"=>"required",
                ]);
                if(Auth::guard('admin')->attempt($data)){
                    return redirect()->route('admin.dashboard');
                }
    
                else{
                    return back();
                }
            }
            
        }
        return view("admin.login");
    }

    public function adminLogout(Request $req){
        Auth::guard("admin")->logout();
        return redirect()->route("adminLogin")->with("error","Logout Successfully");
    }

    
}