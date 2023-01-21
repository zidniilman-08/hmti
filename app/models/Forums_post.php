<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forums_post extends Model
{
    use SoftDeletes;

    protected $table = 'forums_post';

     protected $fillable = [
        'user_id', 'forums_id', 'isi_post',
    ];

    public function Forums()
    {
        return $this->belongsTo(Forums::class);
    }

    public function user()
    {
    	return $this->belongsToMany(User::class,'forums_post_user');
    }
}
