<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'comment' => 'required',
        ]);

        $created = Comment::create([
            'comment' => $validated['comment'],
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);

        if($created) {
            return redirect()->back();
        }

        return redirect()->back()->with('error_create_comment', 'Ocorreu um erro ao criar o comentário.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
