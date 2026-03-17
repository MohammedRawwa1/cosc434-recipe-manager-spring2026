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
            $message = 'Access denied — please use Demo Login.';

            if ($request->expectsJson() || $request->wantsJson()) {
                return response()->json(['message' => $message], 403);
            }

            return redirect()->route('recipes.index')
                ->with('error', $message);
        }

        return $next($request);
    }
}
