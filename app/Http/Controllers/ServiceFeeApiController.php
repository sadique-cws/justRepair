<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceFees;
use Illuminate\Support\Facades\Validator;


class ServiceFeeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $serviceFee = ServiceFees::where("parent_id", null)->where("service_id", $request->service_id)->with("subFees")->get();
        return response()->json($serviceFee, 200);
    }

    public function store(Request $request)
    {

        // Validate the form data
        $validator = Validator::make($request->all(), [
            'service_id' => 'required|string',
            'service_fees_name' => 'required|string',
            'service_fees' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new service fee record
        $serviceFee = new ServiceFees;
        $serviceFee->service_fees_name = $request->input('service_fees_name');
        $serviceFee->service_fees = $request->input('service_fees');
        $serviceFee->service_id = $request->input('service_id');
        $serviceFee->parent_id = $request->input('parent_id', null);
        $serviceFee->save();

        return response()->json(['message' => 'Service fee created successfully'], 200);
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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
