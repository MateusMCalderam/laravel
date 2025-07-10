<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index () {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show ($id) {
        $post = Post::findOrFail($id);

        return view('posts.index', [
            'post' => [
                "post" => $post,
                "comments" => $post->comments(),
                "comments" => $post->comments(),
            ]
        ]);
    }
}
