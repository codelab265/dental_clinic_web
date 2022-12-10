<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller

{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $data = $request->only('email', 'password');

        $login = Auth::attempt($data);

        if ($login) {
            if (in_array(Auth::user()->role, [1, 2])) {
                return redirect()->route('dashboard');
            } elseif (Auth::user()->role == 3) {
                return redirect()->route('staff.services.index');
            } else {
                return redirect()->route('patients.services');
            }
        } else {

            return back()->with('error', 'Login Failed, Please check your email or password');
        }
    }


    public function logout()
    {
        //user logout
        Auth::logout();
        return redirect()->route('login');
    }
}
