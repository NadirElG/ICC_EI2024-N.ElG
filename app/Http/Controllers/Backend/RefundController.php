<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\SlotCanceledMail;
use App\Mail\SlotRefundMail;
use App\Models\Reservation;
use App\Models\Slot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RefundController extends Controller
{
    /**
     * Annule un slot et envoie des notifications par email.
     */
    public function cancelSlot(Request $request, Slot $slot)
    {
        // Valider les données
        $validated = $request->validate([
            'reason' => 'required|string|max:500',
        ]);

        // Mettre à jour le statut du slot en "completed"
        $slot->update(['status' => 'completed']);

        // Notifications par email pour les utilisateurs ayant réservé ce créneau
        $users = Reservation::where('slot_id', $slot->id)->get();
        foreach ($users as $reservation) {
            if ($reservation->user && $reservation->user->email) {
                // Envoi de l'email d'annulation aux utilisateurs
                Mail::to($reservation->user->email)->send(new SlotCanceledMail($slot, $validated['reason'], null)); // Pas de message pour les utilisateurs
            }
        }

        // Notification pour un seul administrateur (id = 3)
        $admin = User::find(3); // Récupérer l'administrateur avec l'ID = 3
        if ($admin && $admin->email) {
            // Envoi de l'email de notification à l'administrateur
            Mail::to($admin->email)->send(new SlotCanceledMail($slot, $validated['reason'], 'Notification pour l’administration.')); // Message spécifique pour l’administrateur
        }

        // Marquer les réservations comme annulées, mais ne pas les supprimer
        $reservations = Reservation::where('slot_id', $slot->id)->where('status', 'reserved')->get();
        foreach ($reservations as $reservation) {
            $reservation->update(['status' => 'canceled']);
        }

        return redirect()->route('coach.slots.index')
            ->with('success', 'Le créneau a été annulé avec succès et les utilisateurs ont été notifiés.');
    }

    /**
     * Rembourse les utilisateurs ayant une réservation sur le slot.
     */
    public function refundUsers(Slot $slot)
    {
        // Récupérer toutes les réservations pour ce slot
        $reservations = Reservation::where('slot_id', $slot->id)->where('status', 'canceled')->get();
    
        // Vérifier que le coach a assez de crédits
        $totalRefund = $reservations->sum(fn($reservation) => $reservation->slot->price);
        $coachWallet = $slot->coach->wallet;
    
        // Vérifier si le coach a assez de fonds pour le remboursement
        if ($coachWallet->balance < $totalRefund) {
            return redirect()->back()->with('error', 'Votre portefeuille ne contient pas assez de crédits pour effectuer les remboursements.');
        }
    
        // Effectuer les remboursements
        foreach ($reservations as $reservation) {
            $reservation->user->wallet->increment('balance', $reservation->slot->price);
            $reservation->update(['status' => 'refunded']);  // Marquer comme remboursé
    
            // Envoyer un email de confirmation du remboursement
            Mail::to($reservation->user->email)->send(new SlotRefundMail($slot)); // Email pour l'utilisateur
        }
    
        // Déduire le montant du coach
        $coachWallet->decrement('balance', $totalRefund);
    
        // Ajouter un message flash à la session pour afficher l'alerte
        return redirect()->route('coach.slots.index')
            ->with('success', 'Le remboursement a été effectué avec succès et les utilisateurs ont été notifiés.');
    }
    
}
