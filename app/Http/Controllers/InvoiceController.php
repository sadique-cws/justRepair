<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Invoice;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;


class InvoiceController extends Controller
{
   
    public function downloadInvoicePdf(Request $request)
{
    // Retrieve the HTML content from the request
    $htmlContent = $request->input('invoiceContent');

    // // Create an instance of Dompdf with options
    // $options = new Options();
    // $options->set('isHtml5ParserEnabled', true);
    // $options->set('isPhpEnabled', true);

    $dompdf = new Dompdf();


    // Load the HTML content
    $dompdf->loadHtml($htmlContent);

    // (Optional) Set the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML content to PDF
    $dompdf->render();

    return $dompdf->stream("document.pdf");

}

    public function viewInvoice(Request $request, $id)
    {
        $invoiceData = Invoice::where("id", $id)->with('appointment')->with('serviceFees')->first();

        return response()->json($invoiceData);
    }

}


