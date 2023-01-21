<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Tag;
use App\models\Artikel;
use DB;

class TagsController extends Controller
{
    public function index(Tag $tag) {

    	$artikel = $tag->artikels;
    	$tags = Tag::has('Artikels')->get();
    	$count = $artikel->count(DB::raw('DISTINCT id'));
        
    	return view('tutorial.tutorial', compact('tags','artikel','count'));
    }
}
