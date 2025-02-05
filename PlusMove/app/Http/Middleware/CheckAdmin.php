<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Define admin-only route names
        $adminOnlyRoutes = [
            'packages.store', 'packages.edit', 'packages.create',
            'customers.store', 'customers.edit', 'customers.create',
            'drivers.store', 'drivers.edit', 'drivers.create'
        ];

        // Check if the current route matches any restricted routes
        if ($request->route() && in_array($request->route()->getName(), $adminOnlyRoutes)) {
            if (!auth()->check() || auth()->user()->roles != 1) {
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
