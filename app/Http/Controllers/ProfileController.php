<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        if ($request->email != '') {
            $user->email = $request->email;
        }
        if ($request->password != '') {
            $user->password = Hash::make($request->password);
        }
        $user->contact_number = $request->contact_number;
        $user->address = $request->address;

        if (Auth::user()->role != 3) {
            $user->specialization = $request->specialization;
        }

        if ($request->photo != '') {
            $photo = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images'), $photo);
            $user->photo = 'images/' . $photo;
        }

        $user->save();

        return back()->with('success', 'Updated successfully');
    }
}
