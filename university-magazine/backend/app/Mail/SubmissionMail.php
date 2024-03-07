<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $facultyName;
    private $coordinatorName;

    /**
     * Create a new message instance.
     */
    public function __construct($userName, $facultyName, $coordinatorName)
    {
        $this->userName = $userName;
        $this->facultyName = $facultyName;
        $this->coordinatorName = $coordinatorName;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('ewsd.ewsd@gmail.com', 'System and Admin'),
            // subject: 'New contribution has been submitted by a student for ' . $this->facultyName . ' Faculty',
        );
    }

    public function build()
    {
        return $this->from('noreply@ewsd.com', 'System and Admin')
            ->subject('New article submission for ' . $this->facultyName . ' Faculty')
            ->view('mails.submission')
            ->with([
                'user' => $this->userName,
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
    //         view: 'mails.submission',
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