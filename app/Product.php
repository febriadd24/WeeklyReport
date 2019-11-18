<?php

namespace App;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'SN_Device', 'NO_Sam','NO_Perso','PCID','CONFIG','Provinsi','Kota','Kecamatan','Alamat','IP_Address','active','User_Name','activation_number','reply_activation_number','activation_date','activation_request_date','publish',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
