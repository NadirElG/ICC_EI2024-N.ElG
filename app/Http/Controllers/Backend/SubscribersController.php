<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\NewsletterSubscriberDataTable;
use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribersController extends Controller
{
    public function index(NewsletterSubscriberDataTable $dataTable)
    {
        return $dataTable->render('admin.subscriber.index');
    }

    public function destroy(string $id)
    {
        $subscriber = \App\Models\NewsletterSubscriber::findOrFail($id)->delete();
        return response(['status' => 'success' , 'message'  => 'Subscriber deleted successfully']);
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'messageContent' => 'required',
        ]);

        $emails = NewsletterSubscriber::where('is_verified' , 1)->pluck('email')->toArray();
        Mail::to($emails)->send(new Newsletter($request->subject, $request->messageContent));
        return redirect()->back()->with('success','Mail sent successfully');
    }
}

