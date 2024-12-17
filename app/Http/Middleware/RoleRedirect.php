<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleRedirect
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
        if (Auth::check()) {
            $role = Auth::user()->role;
            // Allow access for admin and editor roles
            if (in_array($role, ['admin', 'editor', 'customer'])) {
                return $next($request);
            }
        }
        // Redirect unauthenticated users to login
        return redirect()->route('login');
    }
}
