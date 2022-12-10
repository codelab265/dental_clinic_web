<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPatientController extends Controller
{
    public function index()
    {
        $users = User::where('role', 4)->get();
        return view('admin.patients.index', compact('users'));
    }
}
