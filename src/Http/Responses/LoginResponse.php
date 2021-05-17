<?php

namespace App\Http\Responses;

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
        return redirect(auth()->user()->role->redirect_to);
    }
}