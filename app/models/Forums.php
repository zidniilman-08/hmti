<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forums extends Model
{
	use SoftDeletes;

    protected $table = 'forums';

    protected $fillable = ['user_id','slug','judul_forums','deskripsi'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'userforum');
    }

    public function forumpost()
    {
    	return $this->hasMany(Forums_post::class)->orderBy('created_at','desc');
    }

    public function forumsubcribe()
    {
    	return $this->hasMany(Forums_subcribe::class);
    }

    public function forumpostcount()
    {
    	return count($this->forumpost()->get());
    }

}
