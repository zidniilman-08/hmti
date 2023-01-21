<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests,
    App\models\Artikel,
    App\models\User,
    App\models\ImageUser,
    App\models\Tag;
use Auth;
use Session;
use DB;

class HomeController extends Controller
{

  public function __construct(Artikel $artikel, User $user, Tag $tag)
    {
        $this->model = $artikel;
        $this->user  =  $user;
        $this->tag   =   $tag;
        $this->middleware('xss');
    }

  public function index(){
     $newest = Artikel::raw('active','1')->orderBy('created_at','asc')->first();
     $artikels = Artikel::raw('active','1')->orderBy('created_at','asc')->take(8)->get();
     

     $artikel  = Artikel::raw('active','1')->paginate(6);

     $datas    = Artikel::where('active','1')->orderBy('created_at','desc')->take(4)->get();
     
     $recomends = Artikel::raw('views_count','>','0')->orderBy('views_count','>=','1')->take(8)->get();
     
      return view('home', array(
        'artikels'  => $artikels,
        'newest'    => $newest,
        'datas'     => $datas,
        'artikel'   => $artikel,
        'recomends' => $recomends,
      ));
    }

}
