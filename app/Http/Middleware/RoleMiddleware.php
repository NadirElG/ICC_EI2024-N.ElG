<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  Le rôle requis pour accéder à la route
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Vérifie si l'utilisateur connecté a le rôle requis
        if ($request->user()->role !== $role) {
            return redirect()->route('dashboard'); // Redirige si le rôle ne correspond pas
        }

        return $next($request); // Continue vers la prochaine étape si tout va bien
    }
}
