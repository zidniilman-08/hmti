<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{ 
	public $timestamps = false;

	protected $table = "comments";

	protected $fillable = ['user_id','artikel_id','comments'];

	protected $dates = ['timestamp'];


    public function artikel() {
    	return $this->belongsTo(Artikel::class);
    }
    public function user() {
    	return $this->belongsToMany(User::class);
    }
}
