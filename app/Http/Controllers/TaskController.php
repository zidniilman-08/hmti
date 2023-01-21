<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\models\Task;
use Redirect;
use Image;
use Input;
use Validator;

class TaskController extends Controller
{
	public function index() {
	  
	   $tasks = Task::all();
	   return view('adminMaster.calendar.index',compact('tasks'));
	
	}

	public function store(Request $request) {
     $rules = array(
      'img_event'     => 'required|mimes:jpeg,jpg,png,gif',
      );
    $validator = Validator::make(Input::all(), $rules);
    if($validator->fails()){
      return redirect::to('/calendar')
                         ->withErrors($validator)
                         ->withInput(Input::all());
    }else{
        $tasks = new Task();
		$tasks->name = $request->input('name');
		$tasks->deskripsi = $request->input('deskripsi');

	  if(Input::hasFile('img_event')){
	    $image = Input::file('img_event');
        $input['imagename'] = time().'_'.$image->getClientOriginalExtension();

        $destination_path = 'assets/uploads/';
        $img = Image::make($image->getRealPath());
        $img->resize(850, 1100, function ($constraint){
        $constraint->aspectRatio();
        })->save(($destination_path.'/'.$input['imagename']));

        $destination_path = 'assets/img/event/';
        $image->move($destination_path, $input['imagename']);
	    
	    $tasks->img_event = $destination_path.$input['imagename'];
	   }	
		$tasks->tanggal = $request->input('tanggal');
		$tasks->tanggal_akhir = $request->input('tanggal_akhir');
	    $tasks->save();

        return redirect()->route('calendar.index');
    }
	}    

	public function edit() {
		
	}
}
