<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth_header = $request->header(config('api.auth_header_name'));

        if ($auth_header === null) return response()->json('Non authorized', 401);

        if ($auth_header !== config('api.key')) return response()->json('Forbidden', 403);

        return $next($request);
    }
}
