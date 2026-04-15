<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->input('user') !== 'ifts' || $request->input('password') !== '2026') {
            return response()->json([
                'message' => 'Accesso negato',
            ], 401);
        }
        return $next($request);
    }
}
