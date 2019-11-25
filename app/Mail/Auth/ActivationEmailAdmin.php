<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Admin;

class ActivationEmailAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $Admin;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Admin $Admin)
    {
        $this ->Admin = $Admin;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth.activation');
    }
}
