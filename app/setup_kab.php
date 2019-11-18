<?php

namespace App;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Database\Eloquent\Model;
use Illuminate \Foundation\Auth\User as Authenticatable;
use Illuminate \Notifications\Notifiable;
use App;

class setup_kab extends Authenticatable
{
    use Notifiable;
    //
    protected $table = 'setup_kab';
    protected $fillable = ['NAMA_KAB','NO_PROP'];

    public static function kabs($id){
    	return setup_kab::where('NO_PROP','=',$id)
    	->get();
    }
}
