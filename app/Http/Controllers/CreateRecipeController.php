<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateRecipeController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $recipe = new Recipe();
        $recipe->user_id = Auth::id();
        $recipe->title = $request->input('title');
        $recipe->content = $request->input('content');
        $recipe->save();

        return back();
    }
}
