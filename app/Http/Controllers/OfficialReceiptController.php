<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\OfficialReceipt;
use Illuminate\Support\Facades\Auth;

class OfficialReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role==4) {

            $officialReceipts = OfficialReceipt::WhereIn('invoice_id', function($query){
                $query->select('id')->where('patient_id', Auth::id())->from('invoices');

            })->get();

            
        } else {
            
            $officialReceipts = OfficialReceipt::all();
        }
        
        
        $invoices = Invoice::all();

        return view('staff.official_receipt.index', compact('officialReceipts', 'invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $OR = new OfficialReceipt();
        $OR->invoice_id = $request->invoice_id;
        $OR->OR_number = "#OR".rand(10000, 100000);
        $OR->amount_paid = $request->amount_paid;
        $OR->save();

        return back()->with('success', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $officialReceipt = OfficialReceipt::find($id);
        $invoice = Invoice::find($officialReceipt->invoice_id);

        return view('staff.official_receipt.receipt', compact('officialReceipt','invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        OfficialReceipt::find($id)->update($request->only('amount_paid'));
        return back()->with('success', 'Added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
