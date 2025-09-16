<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::with(['user', 'tags'])->get();
    }

    public function store(Request $request)
    {
        $post = Post::create($request->only(['user_id', 'title', 'body']));
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return $post;
    }

    public function show(Post $post)
    {
        return $post->load(['user', 'tags']);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->only(['title', 'body']));
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }
        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
