<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ApiTransactionController extends Controller
{
    public function index(Request $request)
    {


        $transactions = Transaction::where('patient_id', $request->id)->with('medicalRecord', 'invoice', 'officialReceipt')->get();


        return response()->json($transactions);
    }
}