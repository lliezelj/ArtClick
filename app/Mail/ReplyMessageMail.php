<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $originalMessage; 
    public $reply;     

    /**
     * Create a new message instance.
     */
    public function __construct($message, $reply)
    {
        $this->originalMessage = $message->message; // Original message content
        $this->reply = $reply;                      // Reply content
    }

    public function build()
    {
        return $this->subject('Reply to Your Message') // Set subject for the email
                    ->view('emails.replyText'); // Use the plain-text email template
    }
}
