<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\Charge;

class StripeController extends Controller
{
    public function payment()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        //Tester
        dd(Stripe::getApiKey());
    }
    
    public function success()
    {

    }

    public function cancel()
    {

    }
}
