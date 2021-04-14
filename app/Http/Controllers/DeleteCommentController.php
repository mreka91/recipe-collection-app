<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeleteCommentController extends Controller
{
    public function __invoke(Comment $comment)
    {
        $response = Gate::inspect('delete-comment', $comment);

        if ($response->allowed()) {
            $comment->delete();
            return back();
            return redirect('/');
        }

        return abort('401', 'Not your comment');
    }
}
