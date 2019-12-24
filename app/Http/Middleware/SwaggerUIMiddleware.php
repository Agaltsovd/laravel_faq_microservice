<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\SessionServiceProvider;

class SwaggerUIMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_if(app()->environment('production'), 403);

        if (is_null(app()->getProvider(SessionServiceProvider::class))) {
            app()->register(SessionServiceProvider::class);
        }

        return $next($request);
    }
}
