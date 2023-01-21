<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Aboute extends Model
{
     protected $table = 'about';
    
    protected $fillable = ['id_ket', 'judul_ket','isi_ket','foto_ket','theme'];
}
