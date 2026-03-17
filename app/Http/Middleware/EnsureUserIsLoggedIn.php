<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsLoggedIn
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('logged_in') !== true) {
            return redirect()->route('recipes.index')
                ->with('error', 'Access denied — please use Demo Login.');
        }

        return $next($request);
    }
}
