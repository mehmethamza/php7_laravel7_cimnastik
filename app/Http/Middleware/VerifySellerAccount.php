<?php

namespace App\Http\Middleware;

use Closure;

class VerifySellerAccount
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
        if (auth()->check() && auth()->user()->role == "seller") {
            return $next($request);
        }
        else {
            return redirect()->route('home');
        }
    }
}
