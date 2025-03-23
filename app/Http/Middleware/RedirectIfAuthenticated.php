<?php

namespace App\Http\Middleware;

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
                return redirect($this->redirectTo($guard));
            }
        }

        return $next($request);
    }

    /**
     * Determine the redirection path based on the authenticated guard.
     */
    private function redirectTo(?string $guard): string
    {
        return match ($guard) {
            'admin' => RouteServiceProvider::ADMIN,
            'doctor' => RouteServiceProvider::DOCTOR,
            'ray_employee' => RouteServiceProvider::RAY_EMPLOYEE,
            default => RouteServiceProvider::HOME,
        };
    }
}
