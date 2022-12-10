<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\Appointment;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\DentistSchedule;
use App\Models\OfficialReceipt;

class GetController extends Controller
{
    public function medical_record(Request $request)
    {
        $id = $request->id;
        $medicalRecords = MedicalRecord::where('patient_id', $id)->get();

        $view = view('medicalRecord', compact('medicalRecords'))->render();

        return response()->json(['html' => $view]);
    }

    public function invoice(Request $request)
    {
        $id = $request->id;
        $invoices = Invoice::where('patient_id', $id)->get();

        $view = view('invoice', compact('invoices'))->render();
        return response()->json(['html' => $view]);
    }

    public function or(Request $request)
    {
        $officialReceipts = OfficialReceipt::where('invoice_id', $request->id)->get();
        $view = view('or', compact('officialReceipts'))->render();
        return response()->json(['html' => $view]);
    }

    public function schedule_time(Request $request)
    {   
        $now = Carbon::now();
       $day = $request->day;
       $dentist_schedules = DentistSchedule::where('dayOfWeek', $day)->get();
       $appointments = Appointment::where('status','!=', 2)->whereBetween('created_at', [
        $now->startOfWeek(Carbon::SUNDAY)->format('Y-m-d'),
        $now->endOfWeek(Carbon::SATURDAY)->format('Y-m-d'),
    ])->get();
    
       $view = view('schedule_time', compact('dentist_schedules','appointments'))->render();
       return response()->json(['html'=>$view]);
    }
}
