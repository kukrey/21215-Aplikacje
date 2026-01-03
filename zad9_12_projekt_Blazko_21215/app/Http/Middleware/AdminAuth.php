<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('auth.login')->with('error', 'Musisz się zalogować');
        }

        if (!auth()->user()->isAdmin()) {
            return redirect('/')->with('error', 'Brak dostępu do panelu administratora');
        }

        return $next($request);
    }
}
