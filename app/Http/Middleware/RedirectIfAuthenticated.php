<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->role_id == 2) {
                    return redirect(RouteServiceProvider::HOME);
                } elseif (Auth::user()->role_id == 1) {
                    return redirect('bendahara/beranda');
                } elseif (Auth::user()->role_id == 3) {
                    return redirect('guru/beranda');
                } elseif (Auth::user()->role_id == 4) {
                    return redirect('kepalasekolah/beranda');
                }
            }
        }

        return $next($request);
    }
}