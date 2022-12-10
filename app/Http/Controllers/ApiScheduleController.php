<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ApiScheduleController extends Controller
{
    public function index(Request $request)
    {
        $data = Schedule::where('patient_id', $request->id)->where('status', 1)->with('dentist')->get();
        return response()->json($data);
    }
}
