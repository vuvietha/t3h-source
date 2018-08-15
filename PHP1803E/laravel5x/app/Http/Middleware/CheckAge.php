<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param = null)
    {
        $response = $next($request);
        if($request->age < 18 ){
            return redirect()->route('worldcup');

        }elseif($param!=='admin'){
            return redirect()->route('worldcup');

        }
        //return $next($request);
        return $response;
    }
}
