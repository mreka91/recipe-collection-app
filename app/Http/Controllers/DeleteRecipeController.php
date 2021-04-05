<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class DeleteRecipeController extends Controller
{
    public function __invoke(Recipe $recipe)
    {
        $recipe->delete();
        return back();
    }
}
