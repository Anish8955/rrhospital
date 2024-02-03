<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogedIn
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // User is logged in, allow access to all pages
            return $next($request);
        }

        // If the user is not logged in and trying to access an admin page, deny access
        if ($request->is('user')) {
            return redirect()->route('login'); // Redirect to the login page or any other appropriate action
        }

        // For other pages, allow access
        return $next($request);
    }
}

