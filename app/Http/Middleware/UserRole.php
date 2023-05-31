<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response|RedirectResponse) $next
     * @param string $roleForAccess
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $roleForAccess)
    {
        $currentUserRole = $request->user()?->role?->name;

        if ($roleForAccess === $currentUserRole) {
            return $next($request);
        }

        abort(401);
    }
}
