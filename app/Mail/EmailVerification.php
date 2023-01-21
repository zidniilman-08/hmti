<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'hmtinsp15@gmail.com';
        $name = 'HMTI Nusa Putra';

        return $this->view('email.email')
        ->from($address, $name)
        ->with([
            'email_token' => $this->user->email_token,
            'name' => $this->user->username,
        ]);
    }
}
