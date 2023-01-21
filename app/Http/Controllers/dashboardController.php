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
use App\models\User,
    App\models\Tracker;
use Illuminate\Support\Facades\View;
use Illuminate\support\Facades\Auth;
use Alert;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('xss');
    }

    public function index()
    {
    	$admin = DB::table('user')->where('hak_akses','like','%adminMaster%')
      ->orWhere('hak_akses','like','%admin%')->count(DB::raw('DISTINCT id'));
      $kategori = DB::table('kategori')->count(DB::raw('DISTINCT id'));
      $artikel = DB::table('artikel')->count(DB::raw('DISTINCT id'));

      $visitors = Tracker::select(DB::raw("COUNT(id) as count"))
      ->orderBy("visit_date")
      ->groupBy(DB::raw("month(visit_date)"))
      ->get()->toArray();
      $visitors = array_column($visitors,'count');

      return View::make('adminMaster.dashboard.index', array(
         'artikel'  => $artikel,
         'kategori' => $kategori,
         'admin'    => $admin,
         'visitors' => json_encode($visitors)
     ));
    }
}
