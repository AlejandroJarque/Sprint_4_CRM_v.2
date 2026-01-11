<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $title;
    public string $post;

    public function __construct(string $title, string $post)
    {
        $this->title = $title;
        $this->post  = $post;
    }

   
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('nexora@gmail.com', 'Jaki Riggs'),
            subject: 'Nexora',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'mails.mail',
        );
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
