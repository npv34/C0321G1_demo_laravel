<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class VerifyAge
{
    const MIN_AGE = 18;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //logic
        $age = Carbon::parse($request->birthday)->age;
        if ($age < self::MIN_AGE) {
            return redirect()->route('auth.register');
        }
        return $next($request);
    }
}
