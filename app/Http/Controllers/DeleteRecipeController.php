<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class DeleteRecipeController extends Controller
{
    public function __invoke(Recipe $recipe)
    {
        $response = Gate::inspect('delete', $recipe);

        if ($response->allowed()) {
            Storage::delete($recipe->picture_url);
            $recipe->delete();
            return redirect('/');
        }

        return back()->withErrors("Not your recipe");
    }
}
