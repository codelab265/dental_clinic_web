<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiRegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        $data['role'] = 4;
        $data['password'] = Hash::make($request->password);

        User::create($data);
        return response()->json(['data' => true]);
    }
}
