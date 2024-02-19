<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["appointments"=>Appointment::all()]);
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
        // $request->validate([
        //     'fullname' => 'required|string|max:255',
        //     'mobileno' => 'required|string|max:12',
        //     'address' => 'required|string',
        //     'landmark' => 'required|string',
        //     'city' => 'required|string',
        //     'requirement_id'=>'required',
        //     'preferred_date' => 'required|date',
        //     'preferred_time' => 'required|time',
        // ]);
    

        // Store the service
        $appointment = new appointment();
        $appointment->fullname = $request->fullname;
        $appointment->mobileno = $request->mobileno;
        $appointment->address = $request->address;
        $appointment->landmark = $request->landmark;
        $appointment->city = $request->city;
        $appointment->requirement_id = $request->requirement_id;
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
