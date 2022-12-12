<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiDentistController extends Controller
{
    public function index()
    {
        $data = User::where('role', 2)->with('dentist_schedule')->get();
        return response()->json($data);
    }
}