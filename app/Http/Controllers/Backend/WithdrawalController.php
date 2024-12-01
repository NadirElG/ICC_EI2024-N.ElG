<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\WithdrawalRequestMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WithdrawalController extends Controller
{
    /**
     * Afficher le formulaire de demande de retrait
     */
    public function create()
    {
        return view('coach.dashboard.withdrawal_request');
    }

    /**
     * Soumettre la demande de retrait
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1|max:' . auth()->user()->wallet->balance,
            'bank_account_number' => 'required|string',
        ]);

        // Récupérer le coach (l'utilisateur connecté)
        $coach = auth()->user();

        // Trouver l'administrateur avec l'ID 3
        $admin = User::find(3);

        // Vérifier si l'administrateur existe et possède un email
        if ($admin && $admin->email) {
            // Préparer le contenu du mail
            $emailContent = "Demande de retrait pour le coach : " . $coach->name . "\n" .
                            "Montant demandé : " . $validated['amount'] . "€\n" .
                            "Numéro de compte bancaire : " . $validated['bank_account_number'] . "\n" .
                            "Balance actuelle du portefeuille : " . $coach->wallet->balance . "€\n" .
                            "Date de la demande : " . now()->toDateString();

            // Envoyer l'email à l'administrateur
            Mail::raw($emailContent, function ($message) use ($admin) {
                $message->to($admin->email)
                        ->subject('Demande de retrait du coach');
            });
        } else {
            // Si l'administrateur n'a pas été trouvé ou n'a pas d'email
            return redirect()->back()->with('error', 'Administrateur non trouvé ou email manquant.');
        }

        return redirect()->route('coach.dashboard')->with('success', 'Votre demande de retrait a été envoyée avec succès.');
    }
}
