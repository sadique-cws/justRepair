<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Invoice;


class InvoiceController extends Controller
{
   


    public function viewInvoice(Request $request, $id)
    {
        $invoiceData = Invoice::where("id", $id)->with('appointment')->with('serviceFees')->first();

        return response()->json($invoiceData);
    }

}


