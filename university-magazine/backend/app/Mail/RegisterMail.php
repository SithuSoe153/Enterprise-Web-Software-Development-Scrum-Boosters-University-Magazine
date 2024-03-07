<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    private $newUser;
    private $facultyName;
    private $coordinatorName;

    /**
     * Create a new message instance.
     */
    public function __construct($newUser, $facultyName, $coordinatorName)
    {
        $this->newUser = $newUser;
        $this->facultyName = $facultyName;
        $this->coordinatorName = $coordinatorName;
    }

    // public function build()
    // {
    //     return $this->from('info@universitymagazine.com', 'University Magazine')
    //         ->subject($this->data['subject'])
    //         ->view('emails.register')->with($this->data);
    // }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('ewsd.ewsd@gmail.com', 'System and Admin'),
            // subject: 'New user registration for ' . $this->facultyName . ' Faculty',
        );
    }

    public function build()
    {
        return $this->from('test.ewsd@gmail.com')
            ->subject('New user registration for ' . $this->facultyName . ' Faculty')
            ->view('mails.register')
            ->with([
                'user' => $this->newUser,
                'facultyName' => $this->facultyName,
                'coordinatorName' => $this->coordinatorName,
            ]);
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'mails.register',
    //         data: [
    //             'user' => $this->newUser,
    //             'facultyName' => $this->facultyName,
    //         ]
    //     );
    // }

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