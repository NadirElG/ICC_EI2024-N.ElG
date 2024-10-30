<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SlotController extends Controller
{
    /**
     * Affiche la liste des slots du coach.
     */
    public function index()
    {
        return view('coach.dashboard.slots.index');
    }
    
    /**
     * Affiche le formulaire de création d'un nouveau slot.
     */
    public function create()
    {
        // Retourner la vue du formulaire de création
        return view('coach.dashboard.slots.create');
    }

    /**
     * Enregistre un nouveau slot dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'capacity' => 'required|integer|min:1',
            'location' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
        ]);

        // Création du slot pour le coach connecté
        Auth::user()->slots()->create($request->all());

        // Redirection avec message de succès
        return redirect()->route('slots.index')->with('success', 'Slot créé avec succès.');
    }

    /**
     * Affiche le formulaire d'édition d'un slot existant.
     */
    public function edit(Slot $slot)
    {
        // Vérifier que le slot appartient au coach connecté
        if ($slot->coach_id !== Auth::id()) {
            return redirect()->route('slots.index')->with('error', 'Vous n\'êtes pas autorisé à modifier ce slot.');
        }

        // Retourner la vue avec les données du slot
        return view('coach.slots.edit', compact('slot'));
    }

    /**
     * Met à jour un slot dans la base de données.
     */
    public function update(Request $request, Slot $slot)
    {
        // Vérifier que le slot appartient au coach connecté
        if ($slot->coach_id !== Auth::id()) {
            return redirect()->route('slots.index')->with('error', 'Vous n\'êtes pas autorisé à modifier ce slot.');
        }

        // Validation des données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'capacity' => 'required|integer|min:1',
            'location' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
        ]);

        // Mise à jour du slot
        $slot->update($request->all());

        // Redirection avec message de succès
        return redirect()->route('slots.index')->with('success', 'Slot mis à jour avec succès.');
    }

    /**
     * Supprime un slot de la base de données.
     */
    public function destroy(Slot $slot)
    {
        // Vérifier que le slot appartient au coach connecté
        if ($slot->coach_id !== Auth::id()) {
            return redirect()->route('slots.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer ce slot.');
        }

        // Suppression du slot
        $slot->delete();

        // Redirection avec message de succès
        return redirect()->route('slots.index')->with('success', 'Slot supprimé avec succès.');
    }
}
