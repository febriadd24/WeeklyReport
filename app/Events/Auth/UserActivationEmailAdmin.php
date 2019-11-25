<?php

namespace App\Events\Auth;

use Illuminate\Queue\SerializesModels;
use App\Admin;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class UserActivationEmailAdmin
{
    use Dispatchable, SerializesModels;

    public $Admin;
    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct(Admin $Admin)
    {
        //

        $this ->Admin = $Admin;
    }

}
