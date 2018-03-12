<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Manager 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */    
    public function handle($request, Closure $next)
	{		
		if(!Auth::check()) {
			return redirect('/login');
		} else {
			$user = Auth::user();
			if($user->hasRole('manager'))			{
				return $next($request);
				//return redirect('/login');
			} else {
				if($user->hasRole('employee')){
					return $next($request);	
					//return redirect('/');
				}
				else {
					//return $next($request);	
					return redirect('/');
					}
				}
		}
	}
}