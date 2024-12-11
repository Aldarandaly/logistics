<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            if ($user->role === 'admin' || $user->role === 'editor') {
                return redirect('/dashboard');
            }
        }

        if (Auth::guard('customer')->check()) {
            return redirect('home.index');
        }

        return $next($request);
    }
}
