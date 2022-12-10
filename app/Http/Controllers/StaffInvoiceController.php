<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class StaffInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        $users = User::where('role', 4)->get();
        $services = Service::all();

        return view('staff.invoice.index', compact('invoices', 'users', 'services'));
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
        $invoice_number = rand(1000, 9999);
        $invoice_number = '#INVOICE' . $invoice_number;
        if (count($request->service_id) != 0) {
            $invoice = Invoice::create(['invoice_number' => $invoice_number, 'patient_id' => $request->patient_id, 'due_date' => $request->due_date, 'status' => 0])->id;

            for ($i = 0; $i < count($request->service_id); $i++) {
                $service = Service::find($request->service_id[$i]);
                $amount = $service->price;

                $qty = ($request->quantity[$i] == null) ? 1 : $request->quantity[$i];

                InvoiceDetail::create([
                    'invoice_id' => $invoice,
                    'amount' => $amount,
                    'quantity' => $qty,
                    'service_id' => $request->service_id[$i]
                ]);
            }

            return back()->with('success', 'Added successfully');
        } else {
            return back()->with('error', 'Please select service to add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::find($id);

        return view('staff.invoice.invoice', compact('invoice'));
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

    public function updateStatus($id)
    {
        Invoice::find($id)->update(['sent_status' => 1]);
        return back()->with('success', 'Updated Successfully');
    }

    public function update(Request $request, $id)
    {
        Invoice::find($id)->update($request->only('due_date'));
        return back()->with('success', 'Updated successfully');
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
