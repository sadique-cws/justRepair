<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            // Check if there's a complaint number stored in the session
        $complain_no = session()->get('complain_no');

        // Get all appointments
        $appointments = Appointment::all();

        // If there's a complaint number stored in the session, include it in the response
        if ($complain_no) {
            return response()->json(["appointments" => $appointments,'complain_no' => $complain_no]);
        } else {
            // If no complaint number is stored, return only the appointments
            return response()->json(["appointments" => $appointments]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
       
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string',
            'mobileno' => 'required|string',
            'address' => 'required|string',
            'landmark' => 'required|string',
            'city' => 'required|string',
            'requirements' => 'required|array',
            'requirements.*' => 'string|nullable',
            'preferred_date' => 'required|date',
            'preferred_time' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        }

        // Generating Complain Number
        
        do {
            $complain_no = 'JR' . date('Ymd') . mt_rand(1000, 9999);
            // Check if the generated unique number already exists in the database
            $existing = Appointment::where('complain_no', $complain_no)->exists();
        } while ($existing);

        // Store the service
        $appointment = new appointment();
        $appointment->fullname = $request->fullname;
        $appointment->complain_no = $complain_no;
        $appointment->mobileno = $request->mobileno;
        $appointment->address = $request->address;
        $appointment->landmark = $request->landmark;
        $appointment->city = $request->city;
        $appointment->requirements = json_encode($request->requirements); // Assuming 'requirements' is a JSON field

        $appointment->preferred_date = $request->preferred_date;
        $appointment->preferred_time = $request->preferred_time;

        $appointment->save();

        session()->flash('complain_no', $complain_no);
      
        return response()->json(['success' => true,'data'=>$appointment,'msg'=>'Appointment has been successfully Booked']);

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}