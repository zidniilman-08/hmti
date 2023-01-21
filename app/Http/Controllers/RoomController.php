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
use Session;
use Datatables;
use Alert;
use App\models\Room;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('xss');
    }
    
    public function index()
    {
    	return view::make('adminMaster.room.index',compact('room'));
    }


    public function create()
    {
    	return view::make('adminMaster.room.create');
    }

    public function store(Request $request)
    {
    	$rules = array(
    		'no_room' => 'required',
    		'class' => 'required',
    		'lantai' => 'required'
    		);
    	$validasi = Validator::make(Input::all(), $rules);
    	if($validasi->fails()){
    		Alert::warning('Mohon isi form dengan benar !','Ouppss');
    		return Redirect::to('room/create')
    		                   ->withError($validasi)
    		                   ->withInput(Input::all());
    	}else{
    		$room = new Room();

    		$room->no_room = Input::get('no_room');
    		$room->class   = Input::get('class');
    		$room->lantai  = Input::get('lantai');
    		$room->save();

    		Alert::success('Data room berhasil disimpan')->autoClose(2500);
    		return Redirect::to('/room');
    	}
    }
}
