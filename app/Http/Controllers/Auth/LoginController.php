<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Alert;
use Input;
use Redirect;
use View;
use Validator;
use App\models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('xss');
        session_start();
    }

    
    public function formlogin(){

      return view('auth.login'); 
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:user',
            'password' => 'required|min:6|confirmed',
            'passord_confirm' => 'required|same:password'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    public function register(Request $request){
    
     $data = array(      
            'username'         => 'required|max:255',
            'email'            => 'required|email|max:255|unique:user',
            'password'         => 'required|min:8',
            'password_confirm' => 'required|same:password'
        );
     $validator = Validator::make(Input::all(), $data);
      if($validator->fails()){
         Alert::warning('Mohon isi form dengan benar','Oupps Maaf')->persistent('Ok');
         return Redirect::to('register')->withErrors($validator)->withInput(Input::all());
       }else{
         $user = new User();
         $user->username  = $request->input('username');
         $user->email     = $request->input('email');
         $user->password  = $request->input('password');
         $user->hak_akses = 'user';
         $user->save();
         
         Alert::success('akun anda berhasil terdaftar','Selamat')->autoClose(2500);
         return Redirect::to('login');
       }
}

     public function logins(){
     
        $msg = array(
        
         'email.exists'      => 'Email anda salah',
         'email.required'    => 'Kolom tidak boleh dikosongkan !',
         'password.exists'   => 'password anda salah !',
         'password.required' => 'Kolom tidak boleh dikosongkan !'
        
        );
     
        $rules = array(
        
         'email'    => 'required|email|exists:user',
         'password' => 'required'
        
        );
        $validasi = Validator::make(Input::all(), $rules, $msg);
          if($validasi->fails())
           {
              return Redirect::to('login')->withErrors($validasi)->withInput(Input::all());
           }
          else
           {
          
           if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])){
           
             if(Auth::user()->hak_akses=="user")
             {
               if(Auth::user()->verified == 1) {
                 session()->flash('success', 'Yahooo. Selamat datang kembali..');
                 return redirect()->intended('/');
               }else {
                 Alert::error('Anda tidak bisa masuk karena email anda belum di verifikasi','Ouppss maaf..')->persistent('close');
                 session_destroy();
                 Auth::logout();
                 return redirect('/login');
               }
             }
             else if(Auth::user()->hak_akses=="admin")
             {
               $_SESSION['hak_akses'] = "admin";
               $_SESSION['hak_akses'] = array();
               $_SESSION['hak_akses']['disabled'] = false ;
               session()->flash('info', 'Yahoo, Selamat datang !!');
               return redirect()->intended('/dashboard');
             }
           else
           {
             Alert::Warning('anda belum terdaftar sebagai member','Ouppss maaf !!')->autoClose(2500);
             return Redirect::to('/login')->withErrors($validasi)->withInput(Input::all());;
           }
         }
        else
        {
          Alert::error('Email dan Password anda salah !!','Login gagal')->persistent('Ok');
          return Redirect::to('login')->withErrors($validasi)->withInput(Input::all());;
        }
    }
}
    
    public function logout(Request $request){
    
    session_destroy();
    Auth::logout();
    session()->flash('success', 'Yahooo. Sampai jumpa..');
    return Redirect::to('/login');
}
}
