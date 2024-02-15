<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Service::all();

    
        return response()->json($data);
    }

     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ]);
    
        // Store the service
        $service = new Service();
        $service->name = $request->name;
        // Handle file upload
        if ($request->hasFile('icon')) {
            $iconName = time().'.'.$request->icon->getClientOriginalExtension();
            $request->icon->move(public_path('uploads'), $iconName);
            $service->icon = $iconName;
        }
        $service->description = $request->description;
        $service->save();
    
        return response()->json(['success' => true]);
    }

   
    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

  
    public function destroy(string $id)
    {
        //
    }
}
