<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ReservationConfirmationMail;
use App\Models\Reservation;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    /**
     * Affiche la page de confirmation de réservation pour un slot spécifique.
     */
    public function show($id)
    {
        // Récupérer le slot et vérifier son existence
        $slot = Slot::findOrFail($id);

        // Vérifier que le slot a encore de la place disponible
        if ($slot->reservations_count >= $slot->capacity) {
            return redirect()->route('slots.index')->with('error', 'Ce slot est complet.');
        }

        return view('frontend.slots.slot-details', compact('slot'));
    }

    /**
     * Traite la réservation du slot.
     */
    public function store(Request $request, Slot $slot)
    {
        $user = Auth::user();

        // Vérifier que le slot a encore des places disponibles
        if ($slot->reservations()->count() >= $slot->capacity) {
            return redirect()->route('slots.slot-details', $slot->id)->with('error', 'This slot is fully booked.');
        }

        // Vérifier que l'utilisateur a assez de crédits
        if ($user->wallet->balance < $slot->price) {
            return redirect()->route('slots.slot-details', $slot->id)->with('error', 'Insufficient credits in your wallet.');
        }

        // Déduire le montant du wallet de l'utilisateur
        $user->wallet->deductBalance($slot->price);

        // Créer la réservation
        $reservation = new Reservation([
            'user_id' => $user->id,
            'slot_id' => $slot->id,
            'status' => 'reserved',
        ]);
        $reservation->save();

        Mail::to($user->email)->send(new ReservationConfirmationMail($user, $slot));


        return redirect()->route('slots.slot-details', $slot->id)->with('success', 'Reservation successful!');
    }

    
}
