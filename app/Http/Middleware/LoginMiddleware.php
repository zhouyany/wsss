<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        $path = $request->path();
        $rts = date('Y-m-d H:i:s')."你访问的路径是".$path;
        file_put_contents('request.log',$rts . "\r\n",FILE_APPEND);
        return $next($request);
    }
}
