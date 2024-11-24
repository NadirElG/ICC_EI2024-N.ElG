<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index()
    {
        // Récupère les slots actifs avec la capacité disponible, en utilisant la pagination et en sélectionnant les colonnes nécessaires
        $slots = Slot::where('status', 'open')
            ->whereColumn('capacity', '>', 'reservations_count') // Vérifie si des places sont encore disponibles
            ->select('id', 'title', 'image', 'date', 'price', 'capacity', 'reservations_count')
            ->paginate(8); // Affiche 9 slots par page

        return view('frontend.slots.index', compact('slots'));
    }

    public function show($id)
    {
        // Chargement des relations nécessaires pour éviter les problèmes de N+1 requêtes
        $slot = Slot::with(['coach', 'reservations.user'])->findOrFail($id);
        return view('frontend.slots.slot-details', compact('slot'));
    }
}
