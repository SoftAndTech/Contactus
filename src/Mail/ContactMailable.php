<?php

namespace SoftAndTech\Contactus\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use SoftAndTech\Contactus\Helper\ContactusHelper;

class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $userMessage;
    public $name;
    public $email;
    public string $userContact;

    /**
     * Create a new message instance.
     */
    public function __construct(array $userQuery)
    {
        $this->userMessage = $userQuery['avsrContct_u_msg'] ?? '';
        $this->name = $userQuery['avsrContct_u_name'] ?? '';
        $this->email = $userQuery['avsrContct_u_email'] ?? '';
        $this->userContact = $userQuery['avsrContct_u_phone'] ?? '';
    }

    /**
     * Define the envelope with from, replyTo, subject.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(ContactusHelper::get('send_email_to'), ContactusHelper::get('sender_name')),
            replyTo: [new Address($this->email, $this->name)],
            subject: $this->name . ' had a query',
        );
    }

    /**
     * Define the view and its data.
     */
    public function content(): Content
    {
        return new Content(
            view: 'contactus::contact.email', // Or use `view:` if not using markdown
            with: [
                'userMessage' => $this->userMessage,
                'name' => $this->name,
            ],
        );
    }

    /**
     * Attachments (empty here).
     */
    public function attachments(): array
    {
        return [];
    }
}
