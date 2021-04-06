<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class EditRecipeController extends Controller
{
    public function edit(Recipe $recipe, Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $recipe->title = $request->input('title');
        $recipe->content = $request->input('content');
        $recipe->save();

        return back()->with('success', 'You have updated your recipe, yay!');
    }

    public function get(Recipe $recipe)
    {
        return view('edit-recipe', [
            'recipe' => $recipe,
        ]);
    }
}
