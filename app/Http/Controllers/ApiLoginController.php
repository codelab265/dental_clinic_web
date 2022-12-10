<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        $login = Auth::attempt($request->only('email', 'password'));
        if ($login) {
            $data = User::find(Auth::id());
            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false]);
        }
    }
}
