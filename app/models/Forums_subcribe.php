<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Forums_subcribe extends Model
{
    protected $table = 'forums_subcribe';

    protected $fillable = ['forums_id','user_id','subscribed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forums()
    {
        return $this->belongsTo(Forums::class);
    }
}
