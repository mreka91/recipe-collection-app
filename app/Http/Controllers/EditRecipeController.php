<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class EditRecipeController extends Controller
{
    public function __invoke(Recipe $recipe, Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $recipe->title = $request->input('title');
        $recipe->content = $request->input('content');
        $recipe->save();

        return back();
    }
}
