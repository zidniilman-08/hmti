<?php

namespace App\Http\Controllers\AdminAuth;

use App\models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{

  protected $redirectTo = '/';



  public function __construct(){
         $this->middleware('guest', ['except' => 'logout']);
        }

  protected function validator(array $data){

         return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
           ]);
  }

  protected function create(array $data){
          return Admin::create([
         'name' => $data['name'],
         'email' => $data['email'],
         'password' => bcrypt($data['password']),
         ]);
     }

  public function adminLogin(){
       return view('adminLogin');
    }

  public function adminLoginPost(Request $request){
   $this->validate($request, [
     'email' => 'required|email',
     'password' => 'required',
   ]);
   
   if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
	  $user = auth()->guard('admin')->user();
   }else{
      return back()->with('error','your username and password');
   }
  }
}