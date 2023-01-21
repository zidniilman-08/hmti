<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ImageUser extends Model
{
    protected $table = 'user_image';

    public function user()
    {
      return $this->belongsToMany('App\models\User');
    }

}
