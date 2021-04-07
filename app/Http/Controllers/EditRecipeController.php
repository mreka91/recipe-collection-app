<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EditRecipeController extends Controller
{
    public function edit(Recipe $recipe, Request $request)
    {
        $response = Gate::inspect('update', $recipe);

        if (!$response->allowed()) {
            return back()->withErrors("Not your recipe");
        }

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
        $response = Gate::inspect('update', $recipe);

        if ($response->allowed()) {
            return view('edit-recipe', [
                'recipe' => $recipe,
            ]);
        }

        return back()->withErrors("Not your recipe");
    }
}
