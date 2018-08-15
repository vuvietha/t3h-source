<?php

namespace App\Http\Middleware;

use Closure;

class CheckSNT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function checkNumber($number){

        if($number <= 2)
            return false;
        for($i = 2; $i <= sqrt($number); $i++){
            if($number%$i==0)
                return false;

        }
        return true;
    }
    public function handle($request, Closure $next)
    {
        $num = $request->number;   
        if(!$this->checkNumber($num)){
            return redirect()->route('khong-la-snt');

        }
        return $next($request);
    }

   
}
