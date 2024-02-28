<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Invoice;
use PDF;


class InvoiceController extends Controller
{
   
    public function downloadInvoice(Request $request)
    {
        $html = '<html><head><link rel="stylesheet" href="' . asset('path/to/your/styles.css') . '"></head><body>' . $request->invoiceContent . '</body></html>';

        $pdf = PDF::loadHTML($html);
        $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']); // Set PDF options
        $pdf->save(public_path('invoices/invoice.pdf'));
    

        return response()->json([
            'downloadUrl' => asset('invoices/invoice.pdf'),
        ]);

    }
    public function viewInvoice(Request $request, $id)
    {
        $invoiceData = Invoice::where("id", $id)->with('appointment')->with('serviceFees')->first();


        return response()->json($invoiceData);
    }

}


