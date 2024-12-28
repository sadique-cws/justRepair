<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Invoice;
class AdminController extends Controller
{
    public function dashboard(){
        $data['count_appointment'] = Appointment::all()->count();
        $data['count_user'] = User::all()->count();
        $data['count_accepted_appointments'] = Appointment::where('status','accept')->count();
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

    public function viewInvoice(Request $request){
        
       
        $invoiceData = Invoice::create([
            'appointment_id' => $request->appointment_id,
            'servicefees_id' => $request->servicefees_id,
            'total_amount' => $request->total_amount,
        ]);
        $invoiceId = $invoiceData->id;

        return view('admin.viewInvoice', compact("invoiceId", "invoiceData"));
    }

    public function uniqueVisitors(){
        // but i don't have to count the appointments in the unique visitors page, i have to resolve it later
        $data['count_appointment'] = Appointment::all()->count();

        return view('admin.unique-visitors',$data);
    }

    public function newAppointments(){
        $data['count_appointment'] = Appointment::all()->count();
        return view('admin.new-appointments',$data);
    }

    
}
