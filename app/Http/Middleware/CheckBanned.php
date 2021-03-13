<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBanned
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
        if (auth()->check() && auth()->user()->banned_until && now()->lessThan(auth()->user()->banned_until)) {
            $banned_days = now()->diffInDays(auth()->user()->banned_until);
            auth()->logout();

            if ($banned_days > 14) {
                $message = 'Tu cuenta ha sido suspendida definitivamente. Por favor, contactese con el administrador';
            } else {
                $message = 'Tu cuenta ha sido suspendida por '.$banned_days.' días(s). Por favor, contactese con el administrador.';
            }

            return redirect()->route('login')->withMessage($message);
        }
        return $next($request);
    }
}
