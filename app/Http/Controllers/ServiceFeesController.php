<?php

namespace App\Http\Controllers;

use App\Models\serviceFees;
use Illuminate\Http\Request;

class ServiceFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.serviceFee.manage");
    }

  public function insert(Request $request){
    $request->validate([
        "name"  => "required",       
    ]);
    $service = new ServiceFees();
    
  }
}
