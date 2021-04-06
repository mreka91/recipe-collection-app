<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteRecipeController extends Controller
{
    public function __invoke(Recipe $recipe)
    {
        Storage::delete($recipe->picture_url);
        $recipe->delete();
        return redirect('/');
    }
}
