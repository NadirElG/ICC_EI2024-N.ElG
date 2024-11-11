<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
use App\Mail\SubscriptionVerification;
use App\Models\NewsletterSubscriber;
use App\Models\Blog;
use App\Models\Slot; // Ajout de Slot
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $recentBlogs = Blog::with(['category', 'user'])
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->take(8)
            ->get();

        // Récupération des slots récents
        $recentSlots = Slot::with('category')
            ->where('status', 'open')
            ->orderBy('created_at', 'DESC')
            ->take(5)
            ->get();

        return view('frontend.home.index', compact('recentBlogs', 'recentSlots'));
    }

    public function aboutUs()
    {
        return view('frontend.home.about-us');
    }

    public function contactUs()
    {
        return view('frontend.home.contact-us');
    }

    public function teamCoach()
    {
        return view('frontend.home.team-coach');
    }

    public function handleContactForm(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'max:20'],
            'subject' => ['required', 'max:200'],
            'message' => ['required', 'max:1000'],
        ]);

        Mail::to('contact@sloteam.io')->send(new ContactUs($request->subject, $request->message, $request->email));

        return response(['status' => 'success', 'message' => 'Mail sent successfully']);
    }

    public function newsLetterRequest(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $existSubscriber = NewsletterSubscriber::where('email', $request->email)->first();

        if (!empty($existSubscriber)) {
            if ($existSubscriber->is_verified == 0) {
                $existSubscriber->verified_token = Str::random(25);
                $existSubscriber->save();
                Mail::to($existSubscriber->email)->send(new SubscriptionVerification($existSubscriber));
                return response(['status' => 'success', 'message' => 'A verification link sent']);
            } elseif ($existSubscriber->is_verified == 1) {
                return response(['status' => 'error', 'message' => 'Already subscribe with this mail']);
            }
        } else {
            $subscriber = new NewsletterSubscriber();
            $subscriber->email = $request->email;
            $subscriber->verified_token = Str::random(25);
            $subscriber->is_verified = 0;
            $subscriber->save();

            // Send mail
            Mail::to($subscriber->email)->send(new SubscriptionVerification($subscriber));
            return response(['status' => 'error', 'message' => 'Already subscribe with this mail']);
        }
    }

    public function newsLetterEmailVerify($token)
    {
        $verify = NewsletterSubscriber::where('verified_token', $token)->first();

        if ($verify) {
            $verify->verified_token = 'verified';
            $verify->is_verified = 1;
            $verify->save();

            return redirect()->route('home')->with('success', 'Email verification successful')->with('alert', true);
        } else {
            return redirect()->route('home')->with('error', 'Invalid token');
        }
    }
}
