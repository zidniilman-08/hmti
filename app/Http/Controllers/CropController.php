<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\ImageUser;
use app\models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Image;
use Redirect;
use View;
Use DB;
use Session;

class CropController extends Controller{

   public function __construct() {
    
       $this->middleware(['xss','auth','users']);
    
    }
    
   public function savepict(Request $request){

  if(Input::hasFile('images')){
   
   $images = Input::file('images');

   $name_image = time().'_'.$images->getClientOriginalExtension();

   $destination_path = 'assets/uploads/user/';

   $final_image = $destination_path.$name_image;

   $int_image = Image::make($images->getRealPath());

   $int_image->resize(300, null, function($constraint){
     $constraint->aspectRatio();
   })->save($destination_path.'/'.$name_image);
   
   $path = 'assets/uploads/user/img/';

   $images->move($path, $name_image);
   
   $idUser = Auth::user()->id;
   $user = User::find($idUser);
   $user->image = $path . $name_image;
   $user->save();
   
   $avatar = new ImageUser();

   $avatar->user_id   = $request->user()->id;
   $avatar->file_name = $destination_path.$name_image;
   $user->images()->save($avatar);
   
   Session::put('modal', 'true');


 }else{

   $final_image = Input::get('img_bckp');

 }

   Session::put('img', $final_image);

   return Redirect::to('/profile/u/'.Auth::user()->slug);
} 

public function croppict(Request $request){

  Session::forget('modal');

  $img = Auth::user()->image;

  $int_img = Image::make($img);

  $int_img->crop(intval(Input::get('w')), intval(Input::get('h')), intval(Input::get('x')), intval(Input::get('y')));

  $int_img->fit(300);
  
  $int_img->save($img);

  return Redirect::to('/profile/u/'.Auth::user()->slug);
  }
}