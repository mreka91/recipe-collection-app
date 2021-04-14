<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddCommentController extends Controller
{
    public function __invoke(Request $request, Recipe $recipe)
    {
        $this->validate($request, [
            'comment' => ['required', 'string', "max:256"],
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->recipe_id = $recipe->id;
        $comment->comment = $request->input('comment');
        $comment->save();

        return back();
    }
}
