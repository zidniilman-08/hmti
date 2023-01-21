<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'pengaturan';

    protected $fillable = ['id','loading','menu','theme',];
}
