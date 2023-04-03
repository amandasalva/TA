<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if ($role == 'Bendahara' && auth()->user()->role_id == 1) {
            return $next($request);
        }
        if ($role == 'Siswa' && auth()->user()->role_id == 2) {
            return $next($request);
        }
        if ($role == 'Guru' && auth()->user()->role_id == 3) {
            return $next($request);
        }
        if ($role == 'KepSek' && auth()->user()->role_id == 4) {
            return $next($request);
        }
        abort(404);
    }
}