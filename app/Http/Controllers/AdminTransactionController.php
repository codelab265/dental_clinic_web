<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\OfficialReceipt;
use Illuminate\Support\Facades\Auth;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.transactions.index', compact('transactions'));
    }

    public function OR($id)
    {   
        $transaction = Transaction::find($id);
        $officialReceipt = OfficialReceipt::find($transaction->official_receipt_id);
        $invoice = Invoice::find($transaction->invoice_id);

        return view('staff.official_receipt.receipt', compact('officialReceipt','invoice'));
    }
}
