<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\support\Facades\Auth;
use App\models\Artikel,
    App\models\User,
    App\models\ImageUser,
    App\models\Tag,
    App\models\Profile;
use App\models\Favorite;
use Session;
use DB;

class PostController extends Controller
{

    public function __construct(Artikel $post, User $user, Tag $tag) {
        $this->middleware('xss');
        $this->model = $post;
        $this->user  = $user;
        $this->tag   = $tag;
    }


    public function index(){
       $post = Artikel::where('active','=','1')->orderBy('created_at','desc')->limit(10)->get();
       $populer = Artikel::where('views_count','>=','10')->paginate(5);
       $author = Artikel::where('views_count','>=','10')->get();

       return view('posts.post', 
                  compact(
                    'post', 
                    'populer',
                    'author'
                  ));
    }



    public function show($slug){
       
       $post = Artikel::where('slug',$slug)->first();
       
       if(!$post) {
         
         return response()->view('errors.404', [], 404);
       
       }
       
       $key ='post_'.$post->id;
         if(!Session::has($key)){
            Artikel::where('id',$post->id)->increment('views_count');
            Session::put($key,1);
           }
      
      if($post) {
     	  
        if($post->active == 0) {
     		
           return response()->view('errors.404', [], 404);
        
        } else {
            
           foreach ($post->users as $user) {
             $artikels = $user->artikels()->paginate(5);
           }
          
           return  view('posts.shows', array(
              'post'     => $post, 
              'artikels' => $artikels, 
            ));
       }
     }
   }
   

   public function kategori($kategori){
     
      $post = Artikel::where('kategori_artikel',$kategori)->get();
      $populer = Artikel::where('views_count','>=','4')->paginate(5);
      foreach ($populer as $val) {
         $author = $val->users;
       }
         return view('posts.post', compact('post','populer','author'));

      
   }
   public function favoritePost(Artikel $artikel)
   {
      Auth::user()->favorites()->attach($artikel->id);

      return back();
   }

   public function unFavoritePost(Artikel $artikel)
   {
      Auth::user()->favorites()->detach($artikel->id);

      return back();
   }


}
