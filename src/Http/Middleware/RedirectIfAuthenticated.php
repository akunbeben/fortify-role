<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        $roles = Role::all();

        foreach ($guards as $guard) {
            if (!Auth::guard($guard)->check()) {
                return $next($request);
            }

            foreach ($roles as $role) 
            {
                if (auth($guard)->user()->role_id == $role->id) {
                    return redirect($role->redirect_to);
                }
            }
        }
    }
}
