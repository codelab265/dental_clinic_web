<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\DentistSchedule;

class AdminAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        $users = User::whereIn('role', [1, 2])->get();
        return view('admin.appointment.index', compact('appointments', 'users'));
    }

    public function store(Request $request, $id)
    {
        $status = $request->status;

        Appointment::find($id)->update(['status' => $status]);


        return back()->with('success', 'Updated successfully');
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
