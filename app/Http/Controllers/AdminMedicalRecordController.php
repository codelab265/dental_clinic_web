<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = User::where('role', 4)->get();
        $dentists = User::where('role', 2)->get();
        $services = Service::all();
        $users = User::where('role', 4)->whereIn('id', function ($query) {
            $query->select('patient_id')->from('medical_records');
        })->get();
        $medicalRecords = MedicalRecord::all();

        return view('admin.medical_record.index', compact('patients', 'dentists', 'medicalRecords', 'services', 'users'));
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
        $data = $request->only('patient_id', 'dentist_id', 'results', 'service_id', 'treated_date');
        MedicalRecord::create($data);
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
        $patients = User::where('role', 4)->get();
        $dentists = User::where('role', 2)->get();
        $services = Service::all();
        $user = User::find($id);
        $medical_records = MedicalRecord::where('patient_id', $id)->get();
        return view('admin.medical_record.details', compact('user', 'medical_records', 'patients', 'dentists', 'services',));
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
        //
        MedicalRecord::find($id)->update($request->only('patient_id', 'dentist_id', 'results', 'service_id'));
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