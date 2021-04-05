<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $recipes = DB::table('recipes')->limit(5)->get();

        return view('index', [
            'recipes' => $recipes,
        ]);
    }
}
