<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Response;
use DB;
use Redirect;
use App\models\User;
use App\models\ImageUser;
use App\models\Profile;
use Illuminate\Support\Facades\View;
use Illuminate\support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use Alert;
use Image;
use Session;
use Crypt;

class AdminController extends Controller
{
 
 public function __construct(ImageUser $userImage, User $user)
    {
        $this->middleware('auth');
        $this->middleware('xss');
        $this->userImage = $userImage;
        $this->user = $user;
    }


public function tambahadmin(Request $request){
        $messages = array(
          'username.required'         => 'Username tidak booleh kosong.',
          'email.unique'              => 'Email sudah terdaftar.',
          'email.required'            => 'Email tidak boleh kosong.',
          'password.min'              => 'Password tidak boleh kurang dari 6(enam).',
          'password_confirm.required' => 'Password tidak boleh kosong.',
          'password_confirm.same'     => 'Password tidak sesuai.',
          'hak_akses.required'        => 'Hak akses tidak boleh kosong.'
          );
    $rules = array(
      'username'         => 'required',
      'email'            => 'required|email|unique:user',
      'password'         => 'required|min:6|max:45',
      'password_confirm' => 'required|same:password',
      'hak_akses'        => 'required',
      );
    $validator = Validator::make(Input::all(), $rules, $messages);
    if($validator->fails()){
      Alert::warning('silahkan isi form dengan benar !!','Oupps')->persistent('Ok');
      return redirect::to('pengaturan')->withErrors($validator)->withInput(Input::all());
    }
    else{

    $user = new User;

    $menu = "fixed";
    $skin = "skin-blue";
    $avatar = asset('assets/img/avatar/avatar.jpg');

    $user->email     = $request->input('email');
    $user->username  = $request->input('username');
    $user->slug      = str_slug($user->username);
    $user->password  = bcrypt(Input::get('password'));
    $user->image     = $avatar;
    $user->hak_akses = $request->input('hak_akses');
    $user->skin      = $skin;
    $user->menu      = $menu;
    $user->save();

    $profile = new Profile();
    $profile->user_id = $user->id;
    
    $user->profile()->save($profile);

    Alert::success('Admin berhasil ditambahkan !!','Yahoo Berhasil');
    return redirect('pengaturan');
   }
    
}


public function updateuser(Request $request, $id){
  $param = Crypt::decrypt($id);
  $rules = array(
    'username'   =>'required',
    'email'      => 'required|email',
    'password'   => 'required|min:6',
    'password_confirm' => 'required|same:password'
  );
  $validator = Validator::make(Input::all(), $rules);
  if($validator->fails()){
    Alert::warning('mohon isi form dengan benar','Ouupps')->persistent('ok');
    return Redirec::to('/pengaturan')->withErrors($validator)->withInput(Input::all());
  }else{
        
        $user = User::find($param);
        
        $user->username   = $request->input('username');
        $user->email      = $request->input('email');
        $user->password   = bcrypt(Input::get('password'));
        $user->save();

        Alert::success('berhasil mengupdate data user !','yahooo Berhasil')->autoClose(2500);
        return redirec('/pengaturan');


  }
}

 public function updateprofile(Request $request) {

    $rule = array(
        'nama_lengkap' => 'required',
        'pendidikan'   => 'required',
        'motto'        => 'required',
        'tentang'      => 'required',
        'google'       => 'required',
        'facebook'     => 'required',
        'twitter'      => 'required'
        );
    $validator = Validator::make(Input::all(), $rule);
     if($validator->fails()){
        Alert::error('mohon isi kolom dengan benar','Oupps');
        return Redirect::to('/pengaturan')->withErrors($validator)->withInput(Input::all());
     } else {

         $profile =array(
         'nama_lengkap' => $request->input('nama_lengkap'),
         'pendidikan'   => $request->input('pendidikan'),
         'motto'        => $request->input('motto'),
         'tentang'      => $request->input('tentang'),
         'google'       => $request->input('google'),
         'facebook'     => $request->input('facebook'),
         'twitter'      => $request->input('twitter')
         );

         DB::table('profile')->where('user_id','=',Auth::user()->id)->update($profile);
         Alert::success('data profile berhasil di simpan.','Yahoo');
         return Redirect::to('/pengaturan');
     }
 }

 public function saveimage(Request $request){

  if(Input::hasFile('images')){
   
   $images = Input::file('images');

   $name_image = time().'_'.$images->getClientOriginalExtension();

   $destination_path = 'assets/uploads/user/'.Auth::user()->username.'/';
   if (!file_exists(public_path($destination_path))) {
    mkdir(public_path($destination_path), 0755, true);
   }

   $final_image = $destination_path.$name_image;

   $int_image = Image::make($images->getRealPath());

   $int_image->resize(300, null, function($constraint){
     $constraint->aspectRatio();
   })->save($destination_path.'/'.$name_image);
   
   $images->move($destination_path, $name_image);
   
   $idUser = Auth::user()->id;
   $user = User::find($idUser);
   File::delete($user->image);
   $user->image = $destination_path . $name_image;
   $user->save();
   
   $avatar = new ImageUser();

   $avatar->user_id   = $request->user()->id;
   File::delete($avatar->file_name);
   $avatar->file_name = $destination_path.$name_image;
   $user->images()->save($avatar);
   
   Session::put('modal', 'true');


 }else{

   $final_image = Input::get('img_bckp');

 }

   Session::put('img', $final_image);

   return Redirect::to('/pengaturan');
} 

public function cropimage(Request $request){

  Session::forget('modal');

  $img = Auth::user()->image;

  $int_img = Image::make($img);

  $int_img->crop(intval(Input::get('w')), intval(Input::get('h')), intval(Input::get('x')), intval(Input::get('y')));

  $int_img->fit(300);
  
  $int_img->save($img);

  return Redirect::to('/pengaturan');

  }



} 
