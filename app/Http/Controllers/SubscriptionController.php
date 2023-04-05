<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeUser;
use App\Models\MailList;
use Illuminate\Http\Request;
use DrewM\MailChimp\MailChimp;
use Spatie\Mailcoach\Models\EmailListSubscriber;

class SubscriptionController extends Controller
{

    public function subscribe(SubscribeUser $request)
    {
        // Create a new subscriber record
        $subscriber = new MailList();
        $subscriber->email = $request->email;
        $subscriber->save();

        // Add subscriber to Mailchimp list
        $mailchimp = new MailChimp(env('MAILCHIMP_API_KEY'));
        $result = $mailchimp->post("lists/" . env('MAILCHIMP_LIST_ID') . "/members", [
            'email_address' => $subscriber->email,
            'status' => 'subscribed'
        ]);


        return redirect()->back()->with('success', 'Thank you for subscribing! Please check your email to confirm your subscription.');
    }

}