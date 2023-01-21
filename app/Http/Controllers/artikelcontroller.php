<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notifications\PublishPost;
use App\Events\PostPublished;
use Input;
use Implode;
use Validator;
use Redirect;
use DB;
use App\models\Artikel;
use App\models\Kategori;
use App\models\User;
use App\models\Tag;
use App\models\ImageUser;
use App\models\Artikel_tag;
use Illuminate\Support\Facades\View;
use Illuminate\support\Facades\Auth;
use Alert;
use Image, Crypt;
use Notification;
use File;

class Artikelcontroller extends Controller
{

 public function __construct(Artikel $artikel, User $user, Tag $tag)
    {
        $this->middleware('admin');
        $this->middleware('xss');
        $this->model = $artikel;
        $this->user  =  $user;
        $this->tag   =   $tag;
        
    }



 public function Index()
    {
         $artikel = Artikel::orderBy('created_at','desc')->get();
        return View::make('adminMaster.artikel.index',array('artikel' => $artikel,));
    }

 public function create()
   {
        $kategoris = Kategori::all();
        $taging = Tag::all();
        return View::make('adminMaster.artikel.create', array('kategoris' => $kategoris,'taging' => $taging));
   }

 public function store(Request $request)
    {
    $rules = array(
      'judul_artikel'    => 'required|max:70',
      'kategori_artikel' => 'required',
      'foto_artikel'     => 'required|mimes:jpeg,jpg,png,gif',
      'isi_artikel'      => 'required',
      );
    $validator = Validator::make(Input::all(), $rules);
    if($validator->fails()){
      Alert::warning('silahkan isi form dengan benar !!','Oupps')->persistent('Ok');
      return redirect::to('artikel/create')
                         ->withErrors($validator)
                         ->withInput(Input::all());
    }else{
      
      $artikel = new Artikel;

      $image = $request->file('foto_artikel');
      $input['imagename'] = time().'_'.$image->getClientOriginalExtension();

      $destination_path = 'assets/uploads/';
      $img = Image::make($image->getRealPath());
      $img->resize(854, 480, function ($constraint){
      $constraint->aspectRatio();
      })->save(($destination_path.'/'.$input['imagename']));

      $destination_path = 'assets/image_post/';
      $image->move($destination_path, $input['imagename']);
       

      $artikel->judul_artikel    = $request->Input('judul_artikel');
      $kategori = $request->Input('kategori_artikel');
      $artikel->kategori_artikel = implode(',', $kategori);
      $artikel->foto_artikel     = $destination_path . $input['imagename'];
      $artikel->isi_artikel      = $_POST['isi_artikel'];
      $artikel->slug             = str_slug($artikel->judul_artikel);

      $duplicate = Artikel::where('slug',$artikel->slug)->first();
      if($duplicate) {
        Alert::warning('Judul artikel sudah ada !!','Ooppss')->persistent('ok');
        return redirect::to('artikel/create')->withInput(Input::all());
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
                    $artikel->tags()->save($tag_ref);
                } else {
                    $artikel->tags()->attach($tag_ref->id);
                }
            }
        }

      Alert::success('artikel berhasil disimpan !!','Yahoo, Berhasil');
      return redirect('artikel');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       $artikel = Artikel::find($id);
       return View::make('artikel.show')->with('artikel', $artikel);
    }
    
    public function publish($id){
       $artikel = Artikel::find($id);
       $artikel->active = 1;
       $artikel->save();
       foreach ($artikel->users as $val) {
         Notification::send(User::where('id',$val->id)->first(), new PublishPost($artikel));
       }
       event(new PostPublished($artikel));
       Alert::success('artikel berhasil di publikasikan.','Yahooo')->autoClose(1500);
       return redirect('artikel');
    }

    public function notpublish($id){
       $artikel = Artikel::find($id);
       $artikel->active = 0;
       $artikel->save();
       Alert::success('artikel tidak di publikasikan.','Yahooo')->autoClose(1500);
       return redirect('artikel');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */ 
    public function edit($id)
    { 
        
        $kategoris = Kategori::all();
        $artikel   = Artikel::find($id);
        $tag       = Artikel_tag::join('artikel','artikel.id','=','artikel_tag.artikel_id')
                                ->join('tags','tags.id','=','artikel_tag.tag_id')
                                ->where('artikel_id','=',$artikel->id)->get();
       return View::make('adminMaster.artikel.edit',array('artikel' => $artikel, 'kategoris' => $kategoris, 'tag' => $tag));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       $rules = array(
      'judul_artikel'    => 'required|max:255',
      'kategori_artikel' => 'required',
      'foto_artikel'     => 'mimes:jpeg,jpg,png,gif',
      'isi_artikel'      => 'required'
      );
    $validator = Validator::make(Input::all(), $rules);
    if($validator->fails()){
      Alert::warning('silahkan isi form dengan benar !!','Oupps')->persistent('Ok');
      return redirect::to('artikel/' .$id. '/edit')
                         ->withErrors($validator)
                         ->withInput(Input::all());
    }else{
      

      $artikel = Artikel::find($id);
     
      $judul = $request->Input('judul_artikel');
      $kategori = $request->Input('kategori_artikel');
      $slug  = str_slug($judul);
      $duplicate = Artikel::where('slug',$artikel->slug)->first();
       if($duplicate) {
         if($duplicate->id != $artikel->id){
           Alert::warning('Judul artikel sudah ada !!','Ooppss')->persistent('ok');
           return redirect::to('artikel/'.$id.'/edit')->withInput(Input::all());
         }else{
           $artikel->slug = $slug;
         }
       }
      $artikel->judul_artikel    = $judul;
      $artikel->kategori_artikel = implode(',', $kategori);

      if(Input::hasFile('foto_artikel')){
      $image = $request->file('foto_artikel');
      $input['imagename'] = time().'_'.$image->getClientOriginalExtension();

      $destination_path = 'assets/image_post/';
      $img = Image::make($image->getRealPath());
      $img->resize(813, 456, function ($constraint){
      $constraint->aspectRatio();
      })->save(($destination_path.'/'.$input['imagename']));

      $destination_path = 'assets/uploads/';
      $image->move($destination_path, $input['imagename']);

      $artikel->foto_artikel     = $destination_path . $input['imagename'];
      }
      $artikel->isi_artikel      = $_POST['isi_artikel'];

      $artikel->save();

      $tags_id = [];
      $inputs = Input::get();
        if (array_key_exists('tags', $inputs) && $inputs['tags'] != '') {

            $tags = $inputs['tags'];

            foreach ($tags as $tag) {
                $tag_ref = $this->tag->whereTags($tag)->first();
                if (is_null($tag_ref)) {
                    $tag_ref = new $this->tag();
                    $tag_ref->tags = $tag;
                    $tag_ref->save();
                }
                array_push($tags_id, $tag_ref->id);
            }
        }

        $artikel->tags()->sync($tags_id);

      session()->flash('success', 'Yahoo, Berhasil !! Artikel berhasil di update.');
      return redirect('artikel');
 
      }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $artikel = Artikel::findOrfail($id);
        $artikel->tags()->detach();
        $artikel->users()->detach();
        File::delete($artikel->foto_artikel);
        if ( $request->ajax() ) {

          $artikel->delete( $request->all() );

         return response(['msg' => 'Yahhooo !! Artikel berhasil dihapus', 'status' => 'success']);
        }
    
    return response(['msg' => 'Oups artikel gagal dihapus.', 'status' => 'failed']);
  }

}
