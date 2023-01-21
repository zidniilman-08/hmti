<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\support\Facades\Auth;
use DB;
use App\models\Tracker,
    App\models\ImageUser;

class VisitorController extends Controller
{
    public function Index(){
       $no=1;
       $visitors = Tracker::all();
        return View::make('adminMaster.visitor.index',array('visitors' => $visitors, 'no' =>$no));
    }
}
