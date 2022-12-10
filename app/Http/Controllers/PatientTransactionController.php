<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('patient_id', Auth::id())->get();
        return view('patients.transactions.index', compact('transactions'));
    }
}
