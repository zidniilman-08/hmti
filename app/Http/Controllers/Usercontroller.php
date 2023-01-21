<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\support\Facades\Auth;
use Alert;
class Usercontroller extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('xss');
    }
   public function tambahuser(){
	$data = array(      
       'username' => Input::get('username'),
       'email' => Input::get('email'),
       'password' => bcrypt(Input::get('password')),
       'hak_akses' => 'user'
		);

	DB::table('user')->insert($data); 
	return Redirect::to('/login')->with('message','Registrasi anda telah berhasil ^_^');
}

} 



