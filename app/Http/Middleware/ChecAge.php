<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class ChecAge
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

        // Login middleware
//        $age = Auth::user() -> mobile;
//        if($age == 733377888){
//            return redirect()->route('not.adout');
////            return  redirect()->back();
//        }
        return $next($request);
    }
}
