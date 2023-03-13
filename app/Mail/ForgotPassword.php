<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $password;

    /**
     * ForgotPassword constructor.
     * @param $password
     */
    public function __construct($password)
    {
        $this->password = $password;
    }

    /**
     * Build the message
     * @return ForgotPassword
     */
    public function build()
    {
        return $this->view('emails.forgot_email')->with([
            "password" => $this->password,
        ]);
    }
}
