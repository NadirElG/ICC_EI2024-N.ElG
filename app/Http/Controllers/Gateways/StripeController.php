<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Validator;

class StripeController extends Controller
{
    public function payment(Request $request)
    {
        // Validation des données entrantes
        $validator = Validator::make($request->all(), [
            'amount' => 'required|integer|in:10,50,100', // Montants fixes uniquement
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mettre la clé API Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Créer une session Stripe Checkout
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'Recharge Wallet',
                        ],
                        'unit_amount' => $request->input('amount') * 100, // montant en centimes
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('stripe.success', ['amount' => $request->input('amount')]),
                'cancel_url' => route('stripe.cancel'),
            ]);

            // Rediriger vers la page de paiement Stripe
            return redirect()->away($session->url);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la session Stripe : ' . $e->getMessage());
            return back()->with('error', 'Erreur lors de la création du paiement. Veuillez réessayer.');
        }
    }

    public function success(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour compléter cette action.');
        }

        // Validation du montant
        $amount = $request->input('amount');
        if (!in_array($amount, [10, 50, 100])) {
            return redirect()->route('plans')->with('error', 'Montant invalide.');
        }

        try {
            // Vérifier si le wallet existe, sinon le créer
            $wallet = $user->wallet->firstOrCreate([
                'user_id' => $user->id,
            ]);

            // Ajouter le montant payé au wallet
            $wallet->balance += $amount;
            $wallet->save();

            // Log de la transaction
            Log::info("Recharge réussie : Utilisateur {$user->id}, Montant {$amount}€.");

            // Rediriger vers une page de succès avec un message
            return view('stripe.success')->with('message', 'Votre wallet a été rechargé avec succès !');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour du wallet : ' . $e->getMessage());
            return redirect()->route('plans')->with('error', 'Erreur lors de la mise à jour du wallet.');
        }
    }

    public function cancel()
    {
        // Gestion de l'annulation de paiement
        return view('stripe.cancel')->with('error', 'Le paiement a été annulé.');
    }
}
