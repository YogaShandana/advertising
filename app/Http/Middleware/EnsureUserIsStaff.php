<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow access to login and logout routes
        if ($request->routeIs('filament.staff.auth.*')) {
            return $next($request);
        }
        
        // Check if user is authenticated and has staff role
        if (auth()->check()) {
            if (auth()->user()->role !== 'staff') {
                $userName = auth()->user()->name;
                $userRole = auth()->user()->role;
                
                auth()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                session()->flash('filament.notifications', [
                    [
                        'title' => 'Akses Ditolak',
                        'body' => "Anda tidak memiliki akses ke panel ini",
                        'color' => 'danger',
                        'duration' => 'persistent',
                    ]
                ]);
                
                return redirect()->route('filament.staff.auth.login');
            }
        }

        return $next($request);
    }
}
