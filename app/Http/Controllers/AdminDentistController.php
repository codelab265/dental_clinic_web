<?php

namespace App\Http\Controllers;

use App\Models\DentistSchedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDentistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 2)->get();
        return view('admin.dentist.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'contact_number', 'address', 'specialization', 'email');
        $data['password'] = Hash::make($request->password);
        $data['role'] = 2;

        $id = User::create($data)->id;

        for ($i = 0; $i < count($request->dow); $i++) {
            $dentistSchedule = new DentistSchedule();
            $dentistSchedule->user_id = $id;
            $dentistSchedule->dayOfWeek = $request->dow[$i];
            $dentistSchedule->startTime = $request->start[$i];
            $dentistSchedule->endTime = $request->end[$i];
            $dentistSchedule->save();
        }
        return back()->with('success', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('name', 'contact_number', 'address', 'specialization');
        User::find($id)->update($data);

        return back()->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
