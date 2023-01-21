<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Task;

class EventController extends Controller
{
    public function index() {
    	$tasks = Task::all();
    	$events = Task::where('tanggal','=',date('Y-m-d'))->get();
    	return view('event.event',compact('tasks','events'));
    }
}
