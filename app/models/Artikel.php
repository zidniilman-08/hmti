<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Artikel extends Model
{

    
    protected $table = 'artikel';

    protected $fillable = [
               'id',
               'kategori_id',
               'judul_artikel',
               'kategori_artikel',
               'foto_artikel',
               'isi_artikel',
               'created_at',
               'updated_at',
               ];
    protected $guarded = [];
    
    public function kategori()
    {
    	return $this->belongsTo('App\models\Kategori');
    }
    public function users()
    {
    	return $this->belongsToMany('App\models\User');
    }
    public function comments()
    {
      return $this->hasMany(Comment::class);
    }
    public function tags()
    {
      return $this->belongsToMany('App\models\Tag');
    }
    public function favus() {
      return $this->belongsToMany(User::class,'favorites');
    }
    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
                            ->where('artikel_id', $this->id)
                            ->first();
    }
}
