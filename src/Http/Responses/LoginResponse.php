<?php

namespace App\Http\Responses;

use App\Models\Role;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {   
        return $request->wantsJson()
        ? response()->json(['two_factor' => false])
        : $this->redirect();
    }
    
    private function redirect()
    {
        $roles = Role::all();
        foreach ($roles as $role) 
        {
            if (auth()->user()->role_id == $role->id) {
                return redirect($role->redirect_to);
            }
        }
    }
}