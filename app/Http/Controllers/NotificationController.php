<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Response;

class NotificationController extends Controller
{
    public function getNotif() {
    	$data = auth()->user()->unreadNotifications;
    	
    	return Response()->json($data);
    }
}
