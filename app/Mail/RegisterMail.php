<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $firstname;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@mixportal.pl','noreply@mixportal.pl')->view('mails.register',['firstname'=>$this->firstname]);
    }
}
