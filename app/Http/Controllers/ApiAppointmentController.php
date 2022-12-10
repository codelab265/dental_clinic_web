<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\DentistSchedule;

class ApiAppointmentController extends Controller
{
    public function Index(Request $request)
    {
        $id = $request->id;
        $data = Appointment::where('patient_id', $id)->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $now = Carbon::now();
        $appointments = Appointment::where('status', 0)->where('patient_id', $request->patient_id)->whereBetween('created_at', [
            $now->startOfWeek(Carbon::SUNDAY)->format('Y-m-d'),
            $now->endOfWeek(Carbon::SATURDAY)->format('Y-m-d'),
        ])->count();
        if ($appointments > 0) {
            return response()->json(['status' => false, 'message' => 'You already have a pending appointment this week']);
        } else {

            $data = $request->all();
            $data['status'] = 0;
            Appointment::create($data);

            return response()->json(['status' => true, 'message' => 'created successfully'], 200);
        }
    }

    public function delete(Request $request)
    {
        Appointment::find($request->id)->delete();
        return response()->json(['status' => true], 200);
    }

    public function edit(Request $request)
    {
        Appointment::find($request->id)->update($request->only('title', 'description'));
        return response()->json(['status' => true], 200);
    }

    public function services()
    {
        $data = Service::all();
        return response()->json($data);
    }

    public function time(Request $request)
    {
        $data = DentistSchedule::where('dayOfWeek', $request->dow)->get();
        return response()->json($data);
    }
}