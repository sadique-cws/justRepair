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
        return response()->json(Appointment::all());
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
        // Store the service
        $appointment = new appointment();
        $appointment->fullname = $request->fullname;
        $appointment->mobileno = $request->mobileno;
        $appointment->address = $request->address;
        $appointment->landmark = $request->landmark;
        $appointment->city = $request->city;
        $appointment->requirements = json_encode($request->requirements); // Assuming 'requirements' is a JSON field

        $appointment->preferred_date = $request->preferred_date;
        $appointment->preferred_time = $request->preferred_time;
        $appointment->save();

        
      
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
