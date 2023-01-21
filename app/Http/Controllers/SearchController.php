<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Input;
use App\models\Artikel,
    App\models\Tag;
use DB;

class SearchController extends Controller
{
    public function find(Request $request){
       $queries = Artikel::where(function($query)
       {
       	$search = input::get('q');
       	$query->where('judul_artikel','like','%'.$search.'%')->orWhere('kategori_artikel','like','%'.$search.'%');
       })->take(6)->get();
        $resulte = array();
      if(count($queries)>0)
      {
         foreach($queries as $query)
          {
       	   $resulte[] = "<a href='artikels/".$query->slug."' class='show'>
                         <img style='width:70px' src='".asset($query->foto_artikel)."'>".
                        "<span>".str_limit($query->judul_artikel,$limit='30',$end='...')."</span></a>";
          }
      }else if(count($queries)==0){
         $resulte = "<span><b><i class='fa fa-search'></i>Kata kunci      tidak ada yang cocok.</b></span>";  
      }
       return Response::json($resulte);
    }
}
