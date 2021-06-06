<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class apikey
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
        $token = $request->header('API_KEY');
        if ($token != 'helloatg') {
            return response()->json(['message' => 'Invalid API key']);
        }
        return $next($request);
    }
}
