<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PostApiController extends Controller
{
    public function index(): JsonResponse
    {
        $posts = Post::with(['user','comments'])->paginate(15);
        return response()->json($posts);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Post::create($data);
        return response()->json($post, 201);
    }

    public function show(Post $post): JsonResponse
    {
        $post->load(['user','comments']);
        return response()->json($post);
    }

    public function update(Request $request, Post $post): JsonResponse
    {
        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'body' => 'sometimes|required|string',
        ]);

        $post->update($data);
        return response()->json($post);
    }

    public function destroy(Post $post): JsonResponse
    {
        $post->delete();
        return response()->json(null, 204);
    }
}
