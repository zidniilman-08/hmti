<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use DB;
use Redirect;
use Response;
use Illuminate\Support\Facades\View;
use Illuminate\support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use App\models\User,
    App\models\Aboute,
    App\models\ImageUser;
use Alert;
use Crypt;

class adminUserController extends Controller
{
   public function __construct()
    {
       
        $this->middleware('admin');
        $this->middleware('xss');
        error_reporting(E_ALL ^ E_DEPRECATED);
    }

    public function index(Request $request)
    {
    	
    	return View::make('adminMaster.user.index');
    }

    public function getUser() {
        $data = User::all();
        return Response()->json($data);
    }


   public function edit($id){
    $param = Crypt::decrypt($id);
    $user = User::find($param);
    return View::make('adminMaster.user.edit',compact('user'));
   }

   public function update($id){
    
   }


    public function prosespengat(){
        $menu = array(
            'menu' => Input::get('menu'),
            'skin' => Input::get('theme'),
        );
     DB::table('user')->where('id','=',Input::get('id'))->update($menu);
     return Redirect::to('pengaturan');
   }

   public function prosesabout(){
    $hmti = array(
    'judul_ket' => Input::get('judul_ket'),
    'isi_ket' => $_POST['isi_ket'],
    );
    DB::table('about')->where('id_ket','=','1')->update($hmti);
    Alert::success('Berhasil mengaupdate data','Berhasil !!')->autoClose(2500);
    return Redirect::to('pengaturan');

   }
    public function destroy($id){
        $user = User::findOrfail($id);
        $user->delete();
        alert()->success('User berhasil dihapus!','Berhasil !!')->autoClose(2500);
        return Back();
}


}
