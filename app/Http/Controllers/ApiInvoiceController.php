<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

class ApiInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $data = Invoice::where('patient_id', $request->id)->where('sent_status', 1)->with('invoice_detail', 'official_receipt')->get();
        return response()->json($data);
    }

    public function details(Request $request)
    {
        $data = InvoiceDetail::where('invoice_id', $request->id)->with('service')->get();
        return response()->json($data);
    }
}