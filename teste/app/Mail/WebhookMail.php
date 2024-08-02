<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WebhookMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->data['email'], $this->data['nome']),
            subject: $this->data['subject']
        );
    }


    public function content(): Content
    {
        return new Content(
            html:'mails.contact',
        );
    }
    
}
