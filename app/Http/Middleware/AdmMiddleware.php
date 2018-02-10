<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdmMiddleware
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
        if(!Auth::user()->is_Adm == 1){
            echo 'você não tem permissão para isso';
            return redirect('/reservas');
        }
        return $next($request);
        
    }
}
