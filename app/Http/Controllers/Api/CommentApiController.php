<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CommentApiController extends Controller
{
    public function index(): JsonResponse
    {
        $comments = Comment::with(['user','post'])->paginate(15);
        return response()->json($comments);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|string',
        ]);

        $comment = Comment::create($data);
        return response()->json($comment, 201);
    }

    public function show(Comment $comment): JsonResponse
    {
        $comment->load(['user','post']);
        return response()->json($comment);
    }

    public function update(Request $request, Comment $comment): JsonResponse
    {
        $data = $request->validate([
            'body' => 'sometimes|required|string',
        ]);

        $comment->update($data);
        return response()->json($comment);
    }

    public function destroy(Comment $comment): JsonResponse
    {
        $comment->delete();
        return response()->json(null, 204);
    }
}
