<?php

namespace App\Http\Middleware;

use Closure;

class CheckQueryParam
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
        if ($request->query('test') != null) {
            abort(404);
        }
        return $next($request);
    }
}
