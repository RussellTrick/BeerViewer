<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AgeVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user's age is over 18
        if ($request->input('age') < 18) {
            // Redirect the user or return a response indicating they are not authorized
            return redirect()->back()->with('error', 'You must be over 18 to access this page.');
        }

        // Proceed to the next middleware or the route handler
        return $next($request);
    }
}
