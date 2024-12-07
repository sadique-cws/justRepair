<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceFees;
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

    public function updateServiceFees(Request $request, $id, $servicefees_id){
        
        // Find the service fee associated with the service
        $serviceFee = ServiceFees::find($servicefees_id);

        // Check if a service fee exists for this service
        if (!$serviceFee) {
            return redirect()->back();
        }

        // Validate the incoming data for service fee name and fee amount
        $validatedData = $request->validate([
            'service_fees_name' => 'required|string|max:255',  // Name of the service fee
            'service_fees' => 'required|numeric|min:0',        // Fee value, positive number
        ]);

        // Update the service fee details
        $serviceFee->service_fees_name = $validatedData['service_fees_name'];
        $serviceFee->service_fees = $validatedData['service_fees'];

        // Save the updated service fee
        $serviceFee->save();

        return redirect()->back()->with("msg","updated");

    }

    
}
