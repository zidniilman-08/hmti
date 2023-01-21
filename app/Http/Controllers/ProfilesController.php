<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Notifications\NotifUser;
use View;
Use DB;
use Session;
use Validator;
use Alert;
use App\models\Profile;
use App\models\Artikel;
use App\models\User;
use App\models\ImageUser;
use App\models\Tag;
use App\models\Artikel_tag;
use App\models\ArtikelUser;
use Image;
use Input;
use Redirect;
use URL;
use Notification;
use Str;
use File;

class ProfilesController extends Controller
{
	public function __construct(Artikel $artikel,Tag $tag, User $user) {
    
       $this->middleware(['xss','auth','users']);
       $this->artikel = $artikel;
       $this->tag     = $tag;
       $this->user    = $user;
	
	}

    public function index($slug) {

    	$user = User::where('slug',$slug)->first();
    	
    	return View::make('users.profile',compact('user'));
    }

    public function createpost($slug) {
        
      $user = User::where('slug',$slug)->first();
    	return View::make('users.postcreate', compact('user'));
    }

    public function createPostUser(Request $request) {
    $rules = array(
      'judul_artikel'    => 'required|max:70',
      'kategori_artikel' => 'required',
      'foto_artikel'     => 'required|dimensions:max_width=1400,max_height=900,|mimes:jpeg,jpg,png,gif',
      'isi_artikel'      => 'required',
      );
    $validator = Validator::make(Input::all(), $rules);
    if($validator->fails()){
      Alert::warning('silahkan isi form dengan benar !!','Oupps')->persistent('Ok');
      return redirect::to('profile/'.Auth::user()->slug.'/create-post')
                         ->withErrors($validator)
                         ->withInput(Input::all());
    }else{
      
      $artikel = new Artikel;

      $image = $request->file('foto_artikel');
      $folder = 'assets/uploads/artikel/' . Carbon::now()->year . '/' . Carbon::now()->month . '/';
      $uniqid = uniqid();
      $mainFileName = $uniqid . '.' . $image->getClientOriginalExtension();
      $thumbFileName = $uniqid . '_thumb.' . $image->getClientOriginalExtension();
      $input['imagename'] = time().'_'.$image->getClientOriginalExtension();

      if (!file_exists(public_path($folder))) {
            mkdir(public_path($folder), 0755, true);
        }

      $img = Image::make($image->getRealPath());
      $img->resize(854, 480, function ($constraint){
      $constraint->aspectRatio();
      })->save(public_path($folder) . $mainFileName);

      $image->move(public_path($folder) . $thumbFileName);
       

      $artikel->judul_artikel    = $request->Input('judul_artikel');
      $artikel->kategori_artikel = $request->Input('kategori_artikel');
      $artikel->foto_artikel     = $folder . $mainFileName;
      $artikel->isi_artikel      = $_POST['isi_artikel'];
      $artikel->slug             = Str::slug($artikel->judul_artikel);

      $duplicate = Artikel::where('slug',$artikel->slug)->first();
      if($duplicate) {
        Alert::warning('Judul artikel sudah ada !!','Ooppss')->persistent('ok');
        return redirect::to('profile/'.Auth::user()->slug.'/create-post')->withInput(Input::all());
      }

      $artikel->save();
        
      $users = $this->user->whereId(Auth::user()->id)->first();
      $artikel->users()->attach($users);

      $inputs = Input::get();
         if (array_key_exists('tags', $inputs) && $inputs['tags'] != '') {

            $tags = $inputs['tags'];

            foreach ($tags as $tag) {
                $tag_ref = $this->tag->whereTags($tag)->first();
                if (is_null($tag_ref)) {
                    $tag_ref = new $this->tag();
                    $tag_ref->tags = $tag;
                    $tag_ref->slug = str_slug($tag_ref->tags);
                    $artikel->tags()->save($tag_ref);
                } else {
                    $artikel->tags()->attach($tag_ref->id);
                }
            }
        }

      Notification::send(User::where('hak_akses','=','admin')->get(), new NotifUser($artikel));
      
      Alert::success('artikel berhasil disimpan !!','Yahoo, Berhasil');
      return redirect('profile/'.Auth::user()->slug.'/create-post');
       
      }
    }

    public function favoritPost($slug) {
      $user = User::where('slug',$slug)->first();
      $favorites = Auth::user()->favorites;

      return view('users.favorite',compact('favorites','user'));
    }

    public function imageCropPost(Request $request)
    {
        $img = Input::get('image');

        list($type, $img) = explode(';', $img);
        list(, $img)      = explode(',', $img);

        $img = base64_decode($img);
        $image_name= time().'.png';
        $folder = "assets/uploads/images/user/" .Auth::user()->username .'/';

        if (!file_exists(public_path($folder))) {
            mkdir(public_path($folder), 0755, true);
        }
        $paths = $folder . $image_name;

        $cover = Image::make($img);
        $cover->resize(200, 300, function ($constraint){
            $constraint->aspectRatio();
        })->save(public_path($folder) . $image_name);
        
        $user = User::findOrfail(Auth::user()->id);
        $user->image = $paths;
        $user->save();

        $data = '/'.$folder . $image_name;
          
      
      return response()->json($data);
    }

    public function coverCrop(Request $request) {
        $img = Input::get('cover');

        list($type, $img) = explode(';', $img);
        list(, $img)      = explode(',', $img);

        $img = base64_decode($img);
        $image_name= time().'_cover.png';
        $folder = "assets/uploads/images/user/" .Auth::user()->username .'/';

        if (!file_exists(public_path($folder))) {
            mkdir(public_path($folder), 0755, true);
        }

        $paths = $folder . $image_name;

        file_put_contents($paths, $img);
        
        $user = User::find(Auth::user()->id);
        $user->cover = $paths;
        $user->save();
        $data = '/'.$folder . $image_name;
          
      
      return response()->json($data);  
    }

}
