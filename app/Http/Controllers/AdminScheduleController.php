<?php

namespace App\Http\Controllers;

use App\Models\DentistSchedule;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class AdminScheduleController extends Controller
{
    public function index()
    {
        
        $users = User::whereIn('role', [2])->get();
        return view('admin.schedules.index', compact('users'));
    }
    

    public function store(Request $request)
    {
        Schedule::create($request->all());
        return back()->with('success', 'Added successfully');
    }

    public function show($id)
    {   
        $events = [];
        $dentist_schedule = DentistSchedule::where('user_id', $id)->get();

        foreach ($dentist_schedule as $value) {
            $events[] = [
                'title'=>$value->dentist->name,
                'daysOfWeek'=>$value->dayOfWeek,
                'startTime'=>$value->startTime,
                'endTime'=>$value->endTime,
            ];
        }

        return view('calendar', compact('events'));
    }

    public function update(Request $request, $id)
    {
        for ($i=0; $i < count($request->id); $i++) { 
            DentistSchedule::find($request->id[$i])->update(['dayOfWeek'=>$request->dow[$i], 'startTime'=>$request->start[$i], 'endTime'=>$request->end[$i]]);
        }
        return back()->with('success', 'Update successfully');
    }
}
