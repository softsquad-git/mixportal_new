<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuestionMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@mixportal.pl','noreply@mixportal.pl')->subject('Pytanie o ogłoszenie: '.$this->data['title'])
            ->view('mails.question',['title'=>$this->data['title'],'tripStart'=>$this->data['trip-start'] ?? null,'tripEnd'=>$this->data['trip-end'] ?? null,'text'=>$this->data['text'],'name'=>$this->data['name'],
                'email'=>$this->data['email'],'phone'=>$this->data['phone']?? null,'children'=>$this->data['children'] ?? null,'parents'=>$this->data['parents'] ?? null]);
    }
}
