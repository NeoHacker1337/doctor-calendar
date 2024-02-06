<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            if ($user->role === 'admin') {
                // Logic for superadmin role
                return $next($request);
            } else {
                // Handle unauthorized access without triggering a new request
                abort(403, 'Unauthorized action.');
            }
            
        }

        // Redirect to the login page if the user is not authenticated as an admin
        return redirect('/');
    }
}
