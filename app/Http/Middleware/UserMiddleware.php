<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login')->withErrors(['message' => 'You must be logged in to access this page.']);
        }
        if (auth()->user()->getRoleNames()->contains('general_user')) {
            return $next($request);
        }
        abort(403, 'Unauthorized action.');
    }
}
