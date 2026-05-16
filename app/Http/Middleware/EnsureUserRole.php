<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();
        // Jika butuh admin tapi yang login bukan admin -> Abort
        if ($role == 'admin' && !$user->is_admin) {
            abort(403);
        }

        // Jika butuh user biasa tapi yang login adalah admin -> Abort (Opsional)
        if ($role == 'user' && $user->is_admin) {
            abort(403);
        }
        return $next($request);
    }
}
