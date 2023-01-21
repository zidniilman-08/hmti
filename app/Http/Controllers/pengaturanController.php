<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use DB;
use Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\support\Facades\Auth;
use App\models\Setting;
use App\models\Aboute,
    App\models\ImageUser,
    App\models\User,
    App\models\Profile;
use Session;
use Crypt;
class pengaturanController extends Controller
{
   public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('xss');
    }



 public function Index(Request $request)
    {
        
        $aboute = Aboute::where('id_ket','=','1')->first();
        
        $prof = Profile::where('user_id','=',Auth::user()->id)->first();
        
        $data['images'] = Session::get('img');
        
        $data['modal'] = (Session::get('modal') == '' ? 'false': 'true');
        
        return View::make('adminMaster.pengaturan.index',
            array(
                'aboute' => $aboute, 
                'prof'   => $prof, 
                'data'   => $data,
            ));
    }
}
