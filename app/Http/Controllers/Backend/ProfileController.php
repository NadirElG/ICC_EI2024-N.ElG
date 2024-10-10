<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index(){
        return view ('admin.profile.index');
    }


    public function updateProfile(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:users,username,' . Auth::id(),
            'email' => 'required|string|email|max:150|unique:users,email,' . Auth::id(),
        ]);
    
        // Mettre à jour les informations de l'utilisateur connecté
        $user = Auth::user();
        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        
        // Sauvegarder les changements dans la base de données
        $user->save();
    
        // Rediriger avec un message de succès
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
    


    
}
