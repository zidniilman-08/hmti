<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\models\Forums;
use App\models\Forums_post;
use App\models\Forums_subcribe;
use Validator;
use Redirect;
use Input;
use Alert;
use Str;
use Crypt;

class ForumsController extends Controller
{
    public function __construct() {
    	$this->middleware('xss');
    }

    public function index() {
    	$forums = Forums::orderBy('created_at','desc')->get();

    	return view('forum.forum',compact('forums'));
    }

    public function store(Request $req) {
    	$forum = new Forums();
    	$forum->judul_forum = $req->input('judul_topik');
    	$forum->slug = Str::slug($forum->judul_forum);
	    $forum->deskripsi = $req->input('deskripsi');
	    	$duplicate = Forums::where('slug',$forum->slug)->first();
		      if($duplicate) {
		        Alert::warning('Judul topik sudah ada !!','Ooppss')->persistent('ok');
		        return redirect::to('/forums')->withInput(Input::all());
		      }

    	$forum->save();
    	$forum->user()->attach(Auth::user()->id);


    	$subcribe = new Forums_subcribe();
    	$subcribe->user_id   = $req->user()->id;
    	$subcribe->forums_id = $forum->id;
    	$subcribe->subscribed  = ($req->subcribe === null ? 0 : 1);
    	$subcribe->save();
        
        Alert::success('Topik telah dipublikasikan','Yahooo...')->autoClose(3000);
    	return redirect('/forums');
    }

    public function show($slug) {
    	$forums = Forums::where('slug',$slug)->first();

    	return view('forum.show',compact('forums'));
    }

    public function forumpost(Request $req,$id) {
    	$forum_id = Crypt::decrypt($id);

    	$post = new Forums_post();
    	$post->forums_id = $forum_id;
    	$post->isi_post	 = $_POST['isi_post'];
    	$post->save();
    	$post->user()->attach(Auth::user()->id);

    	return redirect()->back();
    }

    public function remove($slug) {
        $forum = Forum::where('slug',$slug)->first();
        $forum->user()->dettach(Auth::user()->id);
        $forum->delete();

        Alert::success('Forum berhasil di hapus','Yahooo')->autoClose(3000);
        return redirect()->to('/forums');
    }
}
