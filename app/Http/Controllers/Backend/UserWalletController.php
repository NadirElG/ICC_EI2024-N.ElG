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
}
