<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Models\Service;
use App\Models\ServiceFees;
use Illuminate\Http\Request;
use Validator;


class ServiceApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $data = Service::with("requirements")->get();
        if($req->search){
            $search= $req->search;
            $data = Service::with("requirements")->where('name','LIKE',"%$search%")->get();

        }
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
        $service->description = $request->description;
        // Handle file upload
        if ($request->hasFile('icon')) {
            $iconName = time() . '.' . $request->icon->getClientOriginalExtension();
            $request->icon->move(public_path('uploads'), $iconName);
            $service->icon = $iconName;
        }
        $service->save();

        $requirements = $request->input('requirements');
        foreach ($requirements as $requirement) {
            $req = new Requirement();
            $req->service_id = $service->id; // Assuming there's a 'service_id' column in the 'requirements' table
            $req->req_name = $requirement;
            $req->save();
        }

        return response()->json(['success' => true]);
    }


    public function show(string $slug)
    {
        $data = Service::where("slug", $slug)->with("requirements")->first();
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['success' => false]);
        }
    }
    
    public function update(Request $request, $slug)
    {
        // dd($request->icon);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',                      
            'description' => 'required|string|min:3',                      
            'icon' => 'nullable',  // Allow optional logo update
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        }

        $service = Service::where("slug", $slug)->first();
        if (!$service) {
            return response()->json([
                'status' => 500,
                'message' => "No Data Found"
            ], 500);
        }


        // Handle the file upload
        // if ($request->hasFile('icon')) {
        //     // Delete the old icon if it exists
        //     if ($service->icon && file_exists(public_path('uploads/' . $service->icon))) {
        //         unlink(public_path('uploads/' . $service->icon));
        //     }

        //     // Save the new icon
        //     $iconName = time() . '.' . $request->icon->getClientOriginalExtension();
        //     $request->icon->move(public_path('uploads'), $iconName);
        //     $service->icon = $iconName;
        // }

        if ($request->filled('icon')) {
            // Decode the Base64 string
            $iconData = $request->input('icon');
        
            // Extract file information from the Base64 string
            preg_match('/^data:image\/(\w+);base64,/', $iconData, $matches);
            $extension = $matches[1]; // File extension (e.g., png, jpg, etc.)
            $iconData = substr($iconData, strpos($iconData, ',') + 1); // Remove the Base64 prefix
            $iconData = base64_decode($iconData);
        
            // Delete the old icon if it exists
            if ($service->icon && file_exists(public_path('uploads/' . $service->icon))) {
                unlink(public_path('uploads/' . $service->icon));
            }
        
            // Save the new icon
            $iconName = time() . '.' . $extension;
            file_put_contents(public_path('uploads/' . $iconName), $iconData);
            $service->icon = $iconName;
        }

        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            // 'icon' => $logo,
        ]);

        return response()->json([
            'status' => 200,
            'message' => "Data Updated Successfully"
        ], 200);
    }



    // public function update(Request $request, string $slug)
    // {

    //     // // Validate the incoming data
    //     // $validatedData = $request->validate([
    //     //     'name' => 'required|string|max:255',
    //     //     'description' => 'required|string',
    //     //     'icon' => 'nullable|image|max:2048',
    //     //     'requirements' => 'nullable|array',
    //     //     'requirements.*.id' => 'nullable|exists:requirements,id',
    //     //     'requirements.*.req_name' => 'required|string|max:255',
    //     // ]);

    //     // dd($validatedData);

    //      // Find the service by its slug
    //      $service = Service::where("slug", $slug)->first();


    //      // Check if the service exists
    //      if (!$service) {
    //          return response()->json(['error' => 'Service not found'], 404);
    //      }



    //     // // Handle file upload
    //     // if ($request->hasFile('icon')) {
    //     //     $iconPath = $request->file('icon')->store('service_icons', 'public');
    //     //     $service->icon = $iconPath; // Update service with the new file path
    //     // }

    //     if ($request->hasFile('icon')) {
    //         // Delete the old icon if it exists
    //         if ($service->icon && file_exists(public_path('uploads/' . $service->icon))) {
    //             unlink(public_path('uploads/' . $service->icon));
    //         }

    //         // Save the new icon
    //         $iconName = time() . '.' . $request->icon->getClientOriginalExtension();
    //         $request->icon->move(public_path('uploads'), $iconName);
    //         $service->icon = $iconName;
    //     }



    //     // Update the service fields
    //     $service->name = $validatedData['name'];
    //     $service->description = $validatedData['description'];
    //     $service->save(); // Save the updated service

    //     // Delete requirements that are not in the updated list
    //     // $existingIds = collect($validatedData['requirements'])->pluck('id')->filter();
    //     // Requirement::where('service_id', $service->id)
    //     //     ->whereNotIn('id', $existingIds)
    //     //     ->delete();

    //     // // Update the requirements
    //     // if (isset($validatedData['requirements'])) {
    //     //     foreach ($validatedData['requirements'] as $reqData) {
    //     //         if (isset($reqData['id'])) {
    //     //             // Update existing requirement
    //     //             $requirement = Requirement::find($reqData['id']);
    //     //             if ($requirement) {
    //     //                 $requirement->req_name = $reqData['req_name'];
    //     //                 $requirement->save();
    //     //             }
    //     //         } else {
    //     //             // Create a new requirement (if no ID provided)
    //     //             Requirement::create([
    //     //                 'service_id' => $service->id,
    //     //                 'req_name' => $reqData['req_name'],
    //     //             ]);
    //     //         }
    //     //     }
    //     // }

    //     // Return a success response
    //     return response()->json(['message' => 'Service updated successfully', 'service' => $service]);
    // }

    public function destroy(string $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        // Delete the service
        $service->delete();

        return response()->json(['message' => 'Service deleted successfully']);
    }
}
