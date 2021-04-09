<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ViewProfileController extends Controller
{
    public function __invoke(User $user)
    {
        return view('view-profile', [
            'user' => $user,
            'userRecipes' => $user->recipes,
        ]);
    }
}
