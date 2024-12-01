<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\DataTables\UserWalletDataTable; // Assure-toi que ce fichier existe
use App\Models\User; // Modèle User avec la relation wallet
use Illuminate\Http\Request;

class UserWalletController extends Controller
{
    public function index(UserWalletDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }

    public function anonymize($id)
    {
        $user = User::findOrFail($id);

        // Vérifie si le rôle est non-admin
        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'Vous ne pouvez pas anonymiser un administrateur.');
        }

        // Anonymisation des données sensibles
        $user->update([
            'name' => 'Utilisateur supprimé',
            'email' => 'deleted' . $user->id . '@users.com',
            'username' => 'deleted' . $user->id,
            'status' => 'inactive', // Passe le statut à inactif
        ]);

        return redirect()->back()->with('success', 'L\'utilisateur a été anonymisé avec succès.');
    }

}
