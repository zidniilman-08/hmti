<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user';
    
    protected $fillable = [
        'username', 'email', 'password','slug','email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function artikels(){

        return $this->belongsToMany('App\models\Artikel');
    
    }
    public function profile() {
    
        return $this->hasMany('App\models\profile');
    
    }
    public function images()
    {
        return $this->hasMany('App\models\ImageUser');
    }
    public function comments() {
        return $this->belongsToMany(Comment::class);
    }

    public function favorites() {
        return $this->belongsToMany(Artikel::class, 'favorites','user_id','artikel_id')->withTimeStamps();
    }

    public function forums()
    {
        return $this->belongsToMany(Forums::class,'userforum');
    }

    public function forumpost()
    {
        return $this->belongsToMany(Forums_post::class, 'forums_post_user');
    }

}
