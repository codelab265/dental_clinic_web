<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\OfficialReceipt;
use App\Models\Schedule;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $patients = User::where('role', 4)->count();
        $appointments = Appointment::where('status', 0)->count();
        $schedules = Schedule::where('status', 0)->count();
        $total_paid = OfficialReceipt::all();
        return view('dashboard', compact('patients', 'appointments', 'schedules', 'total_paid'));
    }
}
