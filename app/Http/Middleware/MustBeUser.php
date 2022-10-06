<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustBeUser
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
        if (auth()->user()->isAn('user')) {
            return $next($request);
        }

        return redirect()->route('logout');
    }
}
