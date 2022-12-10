<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ApiServiceController extends Controller
{
    public function index()
    {
        $data = Service::all();
        return response()->json($data);
    }
}
