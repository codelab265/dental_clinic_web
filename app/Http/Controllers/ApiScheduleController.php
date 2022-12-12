<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiScheduleController extends Controller
{
    public function index(Request $request)
    {
        $data = Appointment::where('patient_id', $request->id)->where('status', 1)->where('sent_status', 1)->with('dentist_schedule')->get();
        return response()->json($data);
    }
}