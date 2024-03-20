<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AgeVerificationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasCookie('age')) {
            $age = $request->cookie('age');
            if ($age >= 18) {
                return $next($request);
            }
        }

        return redirect('verify')->with('message', 'Underage');
    }
}
