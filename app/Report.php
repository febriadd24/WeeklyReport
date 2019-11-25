<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class report extends Model
{
    public function DataUser()
    {
       return $this->belongsTo('App\User','User_id','name');
    }
    protected $fillable = [
    'id','Project','Activity','Detail','Status','Remarks','File','User_id','created_at','updated_at','Days',
    ];
}
