<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentiels = $request->only(['email', 'password']);

        if (Auth::attempt($credentiels)) {
            return redirect('/');
        }

        return back();
    }
}
