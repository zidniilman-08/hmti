<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\models\Artikel;
use App\models\Comment;
use App\models\User;

class CommentController extends Controller
{
    public function __construct(User $user) {

    	$this->middleware(['auth','xss']);
    	$this->user = $user;

    }

    public function store($slug) {
     
     $artikel = Artikel::where('slug',$slug)->first();
     
     $comment = new Comment();
     $comment->artikel_id = $artikel->id;
     $comment->comments = request('comments');
     $comment->save();
     
     $users = $this->user->whereId(Auth::user()->id)->first();
     $comment->user()->attach($users);

     return back();
    }
}
