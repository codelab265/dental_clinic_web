<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Invoice;
use App\Models\MedicalRecord;
use App\Models\OfficialReceipt;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function delete(Request $request)
    {
        $id = $request->id;
        $page = $request->page;
        if ($page == "services") {
            Service::find($id)->delete();
        } elseif ($page == "dentist" || $page == "staff") {
            User::find($id)->delete();
        } elseif ($page == "medical_record") {
            MedicalRecord::find($id)->delete();
        } elseif ($page == "appointments") {
            Appointment::find($id)->delete();
        } elseif ($page == "schedules") {
            Schedule::find($id)->delete();
        } elseif ($page == "invoices") {
            Invoice::find($id)->delete();
        } elseif ($page == "transactions") {
            Transaction::find($id)->delete();
        } elseif ($page == "officialReceipts") {
            OfficialReceipt::find($id)->delete();
        } else {
            return back();
        }

        return back()->with('success', 'Deleted Successfully');
    }
}