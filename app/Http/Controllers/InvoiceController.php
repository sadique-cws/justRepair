<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Invoice;
use PDF;


class InvoiceController extends Controller
{
    public function generateInvoice()
    {
        // $query = Appointment::query();
        // $appointments = $query->get();

        // $invoiceData = Invoice::create([
        //     'id' => $appointments->id(),
        //     'appointment_id' => $appointments->id(),
        //     'service_id' => $appointments->service_id(),
        //     'total_amount' => $appointments->total_amount(),
        // ]);

         // Generate PDF
         
        $pdf = PDF::loadView('admin.invoice', $invoiceData);

         // Download PDF

        return $pdf->download('invoice.pdf');
        // return response()->json(['message' => 'Invoice Downloaded']);
    }

    public function viewInvoice(string $id)
    {
        $appointment = Appointment::where("id",$id)->with("services")->first();
        $invoiceData = Invoice::create([
                'appointment_id' => $appointments->id(),
                'service_id' => $appointments->service_id(),
                'total_amount' => $appointments->total_amount(),
            ]);
            $invoiceData->save();
    
        return response()->json($invoiceData);
    }

}


