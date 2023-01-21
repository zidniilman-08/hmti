<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\support\Facades\Auth;
use Response;

class Login
{
  
   public function handle($request, Closure $next)
    {
        if(!Auth::user() || !Auth::user()->hak_akses = 'admin'){
          return response()->view('errors.404', [], 404);
        }
         
         return $next($request);
        
    }
}
