<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Service;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\DentistSchedule;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function services()
    {
        $services = Service::all();
        return view('patients.services.index', compact('services'));
    }

    public function appointment()
    {
        $appointments = Appointment::where('patient_id', Auth::id())->get();
        $services = Service::all();
        return view('patients.appointment.index', compact('appointments','services'));
    }

    public function appointmentStore(Request $request)
    {   
        $now = Carbon::now();
        $appointments = Appointment::where('status',0)->where('patient_id', Auth::id())->whereBetween('created_at', [
            $now->startOfWeek(Carbon::SUNDAY)->format('Y-m-d'),
            $now->endOfWeek(Carbon::SATURDAY)->format('Y-m-d'),
        ])->count();
            if($appointments>0){
                return back()->with('error', 'You already have a pending appointment this week');
            }else{

                $data = $request->all();
                $data['patient_id'] = Auth::id();
                $data['status'] = 0;
                Appointment::create($data);
                return back()->with('success', 'Booked Successfully');
            }
    }

    public function appointmentView($id)
    {   
        $events = [];
        $appointment = Appointment::find($id);
        $schedule_id = $appointment->dentist_schedule_id;
        $dentist_schedule = DentistSchedule::find($schedule_id);

        $events[] = [
            'daysOfWeek' => $dentist_schedule->dayOfWeek,
            'startTime'=>$dentist_schedule->startTime,
            'endTime'=>$dentist_schedule->endTime,
        ];
       
        return view('calendar', compact('events'));
    }

    public function schedules()
    {
        $appointments = Appointment::where('patient_id', Auth::id())->where('status', 1)->where('sent_status', 1)->get();
        return view('patients.schedules.index', compact('appointments'));
    }

    public function dentist()
    {
        $users = User::where('role', 2)->get();
        return view('patients.dentist.index', compact('users'));
    }

    public function dentist_schedule($id)
    {
        $events = [];

        $dentist_schedules = DentistSchedule::where('user_id', $id)->get();

        foreach($dentist_schedules as $dentist_schedule){
            $events[] = [
                'daysOfWeek'=>$dentist_schedule->dayOfWeek,
                'startTime'=>$dentist_schedule->startTime,
                'endTime'=>$dentist_schedule->endTime,
                'textColor'=>'#fff'
            ];
        }

        return view('calendar', compact('events'));
    }
}
