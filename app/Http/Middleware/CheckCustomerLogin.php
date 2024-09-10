<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomerLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Cek apakah customer_id ada di session atau cookie
         if (!$request->session()->has('customer_id') && !$request->cookie('customer_id')) {
            return redirect()->route('customer.auth.index')->withErrors(['message' => 'Please login first.']);
        }
        return $next($request);
    }
}
