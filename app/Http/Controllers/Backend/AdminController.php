<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function showUsers()
{
    $users = User::all();
    return view('admin.users.index', compact('users'));
}

public function updateUserStatus(User $user)
{
    $user->status = $user->status == 'active' ? 'inactive' : 'active';
    $user->save();

    return redirect()->route('admin.users')->with('success', 'User status updated successfully.');
}

}
