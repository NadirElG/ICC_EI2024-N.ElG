<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function payment(Request $request)
    {
        // Mettre la clé API Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

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
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
        ]);

        // Rediriger vers la page de paiement Stripe
        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('stripe.success') ;
      }

    public function cancel()
    {
        return 'Payment cancel!';
    }
}
