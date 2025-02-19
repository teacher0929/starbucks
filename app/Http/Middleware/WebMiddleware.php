<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();
            $user->last_seen = now();
            $user->update();
        }

        if (auth('customer_web')->check()) {
            $customer = auth('customer_web')->user();
            $customer->last_seen = now();
            $customer->update();
        }

        return $next($request);
    }
}
