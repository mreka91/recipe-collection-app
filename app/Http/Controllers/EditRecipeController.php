<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class EditRecipeController extends Controller
{
    public function edit(Recipe $recipe, Request $request)
    {
        $response = Gate::inspect('update-recipe', $recipe);

        if (!$response->allowed()) {
            return abort('401', 'Not your recipe');
        }

        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['image', 'mimes:jpg'],
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($recipe->picture_url) {
                Storage::delete($recipe->picture_url);
            }
            $path = $request->file('image')->store('images');
            $recipe->picture_url = $path;
        }

        $recipe->title = $request->input('title');
        $recipe->content = $request->input('content');
        $recipe->save();

        return back()->with('success', 'You have updated your recipe, yay!');
    }

    public function get(Recipe $recipe)
    {
        $response = Gate::inspect('update-recipe', $recipe);

        if ($response->allowed()) {
            return view('edit-recipe', [
                'recipe' => $recipe,
            ]);
        }

        return back()->withErrors("Not your recipe");
    }
}
