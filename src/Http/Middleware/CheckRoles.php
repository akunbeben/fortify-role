<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $rolesFromDatabase = Role::all();

        foreach ($rolesFromDatabase as $roles) {            
            if ($role == $roles->name && auth()->user()->role_id != $roles->id) {
                abort(403);
            }
        }

        return $next($request);
    }
}
