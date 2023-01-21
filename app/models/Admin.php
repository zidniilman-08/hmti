<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Remindeble\RemindabeTrait;
use Illuminate\Auth\Remindable\RemindableInterface;

class Admin extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $table = 'admin';

    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
}
