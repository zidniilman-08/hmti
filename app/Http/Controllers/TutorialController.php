<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\models\Artikel;
use App\models\Tag;
use DB;

class TutorialController extends Controller
{
    Public function index() {
        $artikel = Artikel::where('kategori_artikel','=','Tutorial')->paginate(21);
        
        foreach ($artikel as $key) {
        	$count = $key->tags;
        }

    	return View::make('tutorial.tutorial',compact('artikel','tags','count'));
    }
}
