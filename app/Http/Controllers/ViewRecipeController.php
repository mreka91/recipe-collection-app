<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;

class ViewRecipeController extends Controller
{
    public function __invoke(int $id)
    {
        $recipe = Recipe::with('author')->where('id', $id)->get();
        $comments = Comment::with('author')->where('recipe_id', $id)->get();
        return view('view-recipe', [
            'recipe' => $recipe[0],
            'comments' => $comments,
        ]);
    }
}
