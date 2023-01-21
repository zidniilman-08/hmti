<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{

    protected $table = 'kategori';
    
    protected $fillable = ['id', 'nama_kategori','created_at','update_at',];

    public function artikel(){
        return $this->belongsTo('App\models\Artikel');
    }
}
