<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Post $post)
    {
        $posts = $post->with(['user', 'comments'])->paginate(5);

        return view('posts', [
            'title' => 'Posts',
            'posts' => $posts
        ]);
    }
}
