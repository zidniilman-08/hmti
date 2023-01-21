<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\support\Facades\Auth;
use Response;
use Alert;
class Admin
{
    public function handle($request, Closure $next)
    {
        if(!Auth::user() || $request->user()->hak_akses != 'admin'){
          if(!Auth::user()){
            return response()->view('errors.404', [], 404);
          }else{
            return response()->view('errors.404', [], 404);
          }
       }
        return $next($request);
    }
}
