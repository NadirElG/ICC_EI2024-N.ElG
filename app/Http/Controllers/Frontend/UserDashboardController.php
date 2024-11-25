<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Récupérer les réservations de l'utilisateur connecté
        $reservations = Reservation::with('slot')
            ->where('user_id', auth()->id()) // Filtrer par utilisateur connecté
            ->get();

        // Passer les données à la vue
        return view('frontend.dashboard.dashboard', compact('reservations'));
    }
}
