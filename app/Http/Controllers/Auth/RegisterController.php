<?php

namespace App\Http\Controllers\Auth;

use App\models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use View;
use Session;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Jobs\SendVerificationEmail;
use App\models\Profile;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('xss');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:9|unique:user',
            'email'    => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function index() {

        return View::make('auth.register');
    }

    protected function create(array $data)
    {
        return User::create([
         'username' => $data['username'],
         'email' => $data['email'],
         'password' => bcrypt($data['password']),
         'email_token' => base64_encode($data['email']),
         'slug' => $data['username']
        ]);
    }

    public function register(Request $request)
    {
     
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        dispatch(new SendVerificationEmail($user));
        
        $profile = new Profile();
        $profile->user_id = $user->id;
    
        $user->profile()->save($profile);
        
        $message = 'Terimakasih sudah mendaftar.. silahkan buka email anda untuk aktivasi akun';
        Session::flash('emailsuccess',$message);
        return view('email.emailverification');
    }

    public function verify($token)
    {

        $user = User::where('email_token',$token)->first();
        $user->verified = 1;
        if($user->save()){
        Session::flash('success','Verifikasi email anda berhasil silahkan login..');
        return redirect('/login');
        }
    }

}
