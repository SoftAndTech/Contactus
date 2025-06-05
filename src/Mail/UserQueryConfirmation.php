<?php

namespace SoftAndTech\Contactus\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
 
use Illuminate\Contracts\Queue\ShouldQueue; 
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope; 
use SoftAndTech\Contactus\Mail;
use Illuminate\Mail\Markdown;

class UserQueryConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    public function build()
    {
        return $this->subject('We Received Your Query')
                    ->view('contactus::contact.user_query_confirmation')
                    ->with(['contactData' => $this->contactData]);
    }
}
