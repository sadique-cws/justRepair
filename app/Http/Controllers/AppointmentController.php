<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
public function index(){
    return view("admin.appointment.manage");
}

public function show(){
    return view("admin.appointment.view");
}
}