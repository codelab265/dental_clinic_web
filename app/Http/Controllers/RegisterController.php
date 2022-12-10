<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $data = $request->except('btn_login');
        $data['role'] = 4;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return back()->with('success', 'Register successfully');
    }
}
