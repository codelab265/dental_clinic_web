<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiDentistController extends Controller
{
    public function index()
    {
        $data = User::where('role', 2)->get();
        return response()->json($data);
    }
}
