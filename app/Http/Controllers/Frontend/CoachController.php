<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer les coachs actifs
        $query = User::where('role', 'coach')->where('status', 'active');

        // Appliquer le filtre de recherche si un mot-clé est fourni
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('username', 'like', '%' . $request->search . '%');
        }

        // Paginer les résultats
        $coaches = $query->paginate(9);

        // Retourner la vue avec les données
        return view('frontend.coaches.index', compact('coaches'));
    }
}
