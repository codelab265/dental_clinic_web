<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\DentistSchedule;

class StaffScheduleController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('status', 1)->get();
        $invoices = Invoice::all();
        return view('staff.schedules.index', compact('appointments', 'invoices'));
    }

    public function update(Request $request, $id)
    {
        Appointment::find($id)->update(['sent_status' => 1]);
        return back()->with('success', 'Updated Successfully');
    }

    public function view($id){
        $events = [];
        $appointment = Appointment::find($id);
        $schedule_id = $appointment->dentist_schedule_id;
        $dentist_schedule = DentistSchedule::find($schedule_id);

        $events[] = [
            'title' => $appointment->patient->name,
            'daysOfWeek' => $dentist_schedule->dayOfWeek,
            'startTime'=>$dentist_schedule->startTime,
            'endTime'=>$dentist_schedule->endTime,
        ];

        return view('calendar', compact('events'));
    }
}
