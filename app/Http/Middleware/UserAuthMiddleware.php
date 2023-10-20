<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (!Auth::check()) {
            return redirect()->route('customer#signin');
        }
        $user = Auth::user();

        if ($user->role != $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
