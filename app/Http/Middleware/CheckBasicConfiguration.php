<?php

namespace App\Http\Middleware;

use Closure;

class CheckBasicConfiguration
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
        // if (empty(\Session::get('user.society_id'))) {
        //     return redirect('societyList');
        // }
        return $next($request);
    }
}
