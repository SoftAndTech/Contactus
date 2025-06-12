<?php

namespace SoftAndTech\Contactus\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;
use SoftAndTech\Contactus\Helper\ContactusHelper;

class UserQueryConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $email;
    public string $userContact;
    public string $userMessage;

    /**
     * Create a new message instance.
     */
    public function __construct(array $userQuery)
    {
        $this->name = $userQuery['avsrContct_u_name'] ?? '';
        $this->email = $userQuery['avsrContct_u_email'] ?? '';
        $this->userMessage = $userQuery['avsrContct_u_msg'] ?? '';
        $this->userContact = $userQuery['avsrContct_u_phone'] ?? '';
    }

    /**
     * Define the email envelope (headers).
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address( ContactusHelper::get('send_email_to'), ContactusHelper::get('sender_name')),
            to: [new Address($this->email, $this->name)],
            subject: 'We Received Your Query'
        );
    }

    /**
     * Define the content (view or markdown).
     */
    public function content(): Content
    {
        return new Content(
            view: 'contactus::contact.user_query_confirmation',
        );
    }

    /**
     * Attachments (if any).
     */
    public function attachments(): array
    {
        return [];
    }
}
