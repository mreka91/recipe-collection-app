<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ViewRecipeController extends Controller
{
    public function __invoke(Recipe $recipe)
    {

        $author = $recipe->author();
        dd($author);

        return view('view-recipe', [
            'recipe' => $recipe,
        ]);
    }
}
