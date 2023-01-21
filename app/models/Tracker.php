<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Request;

class Tracker extends Model
{

public $attributes = ['hits' => 0];

    protected $fillable = ['ip_address','date'];

    protected $table = 'visitors';

    public static function boot() {
        date_default_timezone_set('Asia/Jakarta');
        static::creating(function ($tracker) {
            $tracker->hits = 0;
        } );

        static::saving(function ($tracker) {
            $tracker->visit_date = date('Y-m-d');
            $tracker->visit_time = date('H:i:s');
            $tracker->hits++;
        } );
    }

    public function scopeCurrent($query) {
        date_default_timezone_set('Asia/Jakarta');
        return $query->where('ip_address', $_SERVER['REMOTE_ADDR'])
                        ->where('date', date('Y-m-d'));
    }

    public static function hit() {
        date_default_timezone_set('Asia/Jakarta');
        static::firstOrCreate([
                  'ip_address' => trim($_SERVER['REMOTE_ADDR']),
                  'date' => date('Y-m-d'),
              ])->save();
    }


}
