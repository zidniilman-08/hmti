<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['name','deskripsi','img_event','tanggal','tanggal_akhir'];
    protected $dates = ['created_at'];
}
