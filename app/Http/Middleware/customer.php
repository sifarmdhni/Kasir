<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated as a customer
        if (!Auth::guard('customer')->check()) {
            return redirect('/login');  // Redirect to login if not authenticated
        }

        return $next($request);  // Proceed if authenticated
    }
}
