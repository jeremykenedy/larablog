<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $firstname;
    public $lastname;
    public $phone;
    public $email;
    public $messageLines;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($validatedData)
    {
        $this->firstname = array_key_exists('firstname', $validatedData) ? $validatedData['firstname'] : null;
        $this->lastname = array_key_exists('lastname', $validatedData) ? $validatedData['lastname'] : null;
        $this->phone = array_key_exists('phone', $validatedData) ? $validatedData['phone'] : null;
        $this->email = array_key_exists('email', $validatedData) ? $validatedData['email'] : null;
        $this->messageLines = array_key_exists('message', $validatedData) ? explode("\n", $validatedData['message']) : null;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contact');
    }
}
