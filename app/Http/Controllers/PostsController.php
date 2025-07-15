<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('user', 'category')->latest();

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        $posts = $query->get();

        $categories = \App\Models\Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }


    public function show($id)
    {
        $post = Post::with('comments.user')->findOrFail($id);

        return view('posts.show', [
            'post' => $post,
            'comments' => $post->comments,
        ]);
    }

}
