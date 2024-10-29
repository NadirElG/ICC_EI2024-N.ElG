<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CoachProfileController extends Controller
{
    public function index()
    {
        return view('coach.dashboard.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:users,username,' . Auth::id(),
            'email' => 'required|string|email|max:150|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        $user->save();

        toastr()->success('¨Profile updated');
        return redirect()->back();
    }

    public function updatePassword(Request  $request)
    {
    $request->validate([
        'current_password' => ['required', 'current_password'],
        'password' => ['required', 'min:8', 'confirmed'],
    ]);


    $updated = $request->user()->update([
        'password' => bcrypt($request->password)
    ]);

    if ($updated) {
        toastr()->success('Profile password updated successfully');
    } else {
        toastr()->error('Failed to update password');
    }

    return redirect()->back();
    }
}
