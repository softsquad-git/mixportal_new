<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;
    public $firstname;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $topic, string $content, string $email)
    {
        $this->email = $email;
        $this->topic= $topic;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@mixportal.pl','noreply@mixportal.pl')->view('mails.report',['email'=>$this->email,'topic'=>$this->topic,'content'=>$this->content]);
    }
}
