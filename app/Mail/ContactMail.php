<?php

namespace App\Mail;

use App\Mail\ContactMail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bag;
    
    public function __construct($values)
    {
        
        $this->bag=$values;
    }

/**
 * Build the message.
 *
 * @return $this
 */
public function build()
{
    return $this->from($this->bag['email'])
    ->view('contact.contactmail');
}
}
