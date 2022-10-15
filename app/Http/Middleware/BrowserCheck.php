<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use hisorange\BrowserDetect\Parser as Browser;

class BrowserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Browser::isIE())
        {
            return redirect()->route('browser.notsupported');
        }
        return $next($request);
    }
}
