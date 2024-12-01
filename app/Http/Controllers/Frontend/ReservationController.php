<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ReservationConfirmationMail;
use App\Models\Reservation;
use App\Models\Slot;
use App\Models\WalletTransaction;
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
            return redirect()->route('slots.slot-details', $slot->id)->with('error', 'Ce créneau est complet.');
        }

        // Vérifier que l'utilisateur a assez de crédits
        if ($user->wallet->balance < $slot->price) {
            return redirect()->route('slots.slot-details', $slot->id)->with('error', 'Crédits insuffisants dans votre portefeuille.');
        }

        // Déduire le montant du wallet de l'utilisateur
        $user->wallet->decrement('balance', $slot->price);

        // Créer la réservation
        $reservation = new Reservation([
            'user_id' => $user->id,
            'slot_id' => $slot->id,
            'status' => 'reserved',
        ]);
        $reservation->save();

        // Enregistrer la transaction dans la table wallet_transactions pour l'utilisateur
        WalletTransaction::create([
            'wallet_id' => $user->wallet->id,
            'user_id' => $user->id,
            'type' => 'deduction', // Type de la transaction (déduction)
            'amount' => $slot->price,
            'description' => 'Déduction pour la réservation du créneau: ' . $slot->title,
        ]);

        // Ajouter le montant au portefeuille du coach
        $slot->coach->wallet->increment('balance', $slot->price);

        // Enregistrer la transaction dans la table wallet_transactions pour le coach
        WalletTransaction::create([
            'wallet_id' => $slot->coach->wallet->id,
            'user_id' => $slot->coach->id,
            'type' => 'recharge', // Type de la transaction (recharge)
            'amount' => $slot->price,
            'description' => 'Crédité pour la réservation du créneau: ' . $slot->title,
        ]);

        // Envoyer un email de confirmation à l'utilisateur
        Mail::to($user->email)->send(new ReservationConfirmationMail($user, $slot));

        return redirect()->route('slots.slot-details', $slot->id)->with('success', 'Réservation effectuée avec succès!');
    }
}

