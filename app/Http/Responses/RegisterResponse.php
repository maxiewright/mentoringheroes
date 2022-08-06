<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade
        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended('/admin');
    }
}
