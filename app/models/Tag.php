<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = ['id','tags'];

    public function artikels()
    {
    	return $this->belongsToMany('App\models\Artikel');
    }

    public function getRouteKeyName() {

    	return 'tags';
    
    }
}
