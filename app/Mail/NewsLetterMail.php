<?php

namespace App\Mail;

use App\Models\MailList;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsLetterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newsletter)
    {
        $this->content = $newsletter->content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newsletter', ['content' => $this->content]);
    }

    public static function subscribe($email)
    {
        $mailList = new MailList();
        $mailList->email = $email;
        $mailList->save();
    }
}