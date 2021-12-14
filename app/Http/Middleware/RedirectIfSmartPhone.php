<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Routing\Redirector;

class RedirectIfSmartPhone
{
    /**
     * USER_AGENT element
     */

    protected $agents = [

        "Android",
        "iPhone",
        "iPad",
        "googlelebot-mobile",
        "iemobile",
        "opera mobile"
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$this->isSmartPhonePage($request)&&
        $this->isSmartPhone($request)){
            return redirect($this->generateSmartPhonePage($request));
        }
        return $next($request);
    }

    protected function isSmartPhonePage($request){
        return preg_match("#^(sptop|sp)#",$request->path());
    }
    protected function isSmartPhone($request){
        return preg_match("/(".implode("|",$this->agents).")/",Arr::get($_SERVER,'HTTP_USER_AGENT',"PC"));
    }
    protected function generateSmartPhonePage($request){
        $path = $request->path();
        if(empty($path)||$path=="/"){
            return"sptop";
        }
        return "sp/".$path;
    }
}
