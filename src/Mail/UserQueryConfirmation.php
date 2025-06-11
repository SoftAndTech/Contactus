<?php

namespace SoftAndTech\Contactus\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserQueryConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $userQuery;

    public function __construct($userQuery)
    {
        $this->userQuery = $userQuery;
    }

    public function build()
    {
        return $this->subject('We Received Your Query')
                    ->view('contactus::contact.user_query_confirmation')
                    ->with([
                        'name'    => $this->userQuery['name'] ?? '',
                        'email'   => $this->userQuery['email'] ?? '',
                        'message' => $this->userQuery['message'] ?? '',
                    ]);
    }
}
