<?php

namespace App\Http\Controllers;

use App\Models\Recipe;

class ViewRecipeController extends Controller
{
    public function __invoke(int $id)
    {
        $recipe = Recipe::with('author', 'comments', 'comments.author')->where('id', $id)->first();
        return view('view-recipe', [
            'recipe' => $recipe,
        ]);
    }
}
