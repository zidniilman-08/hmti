<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profile";

    protected $fillable = [
    	'id'.
    	'user_id',
    	'nama_lengkap',
    	'pendidikan',
    	'motto',
    	'tentang',
    	'google',
    	'facebook',
    	'twitter'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongTo('App\models\User');
    }
}
