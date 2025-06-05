<?php
 
namespace SoftAndTech\Contactus\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use SoftAndTech\Contactus\Mail;
use Illuminate\Mail\Markdown;


class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $message;
    public $name;
    public $email;
    /**
     * Create a new message instance.
     */
    public function __construct($message, $name, $email)
    {
        $this->message = $message;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // from: new Address($this->email, $this->name),
            from: new Address(config('conf_contact.send_email_to'), config('conf_contact.sender_name')),
            replyTo: [
                new Address($this->email, $this->name),
            ],
            subject: $this->name. ' had a query',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: $this->message,
    //     );
    // }
    public function build()
    {
         
        return $this->markdown('contactus::contact.email') 
        ->with([
            'message' => $this->message,
            'name' => $this->name
        ]);
 
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
