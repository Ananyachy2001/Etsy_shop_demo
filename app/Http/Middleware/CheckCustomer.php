<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->user_role == 'Customer') {
            return $next($request);
        }

        // If the user does not have the 'Customer' role, redirect back with an error message
        return redirect()->back()->with('error', 'You are the Admin!');
    }
}
