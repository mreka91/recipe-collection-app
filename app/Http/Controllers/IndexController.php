<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $recipes = Recipe::select('id', 'title', 'picture_url')->orderBy('updated_at', 'desc')->paginate(5);
        return view('index', [
            'recipes' => $recipes,
        ]);
    }
}
