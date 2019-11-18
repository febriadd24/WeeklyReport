<?php

namespace App;
use Illuminate \Foundation\Auth\User as Authenticatable;
use Illuminate \Foundation\Auth\Events\Authenticated;
use Illuminate \Foundation\Database\Eloquent\Model;
use Illuminate \Notifications\Notifiable;
class setup_prop extends Authenticatable
{
    use Notifiable;
    //
    protected $table = 'setup_prop';
    protected $fillable = ['NO_PROP','NAMA_PROP'];
}
