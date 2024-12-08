<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        $user = auth()->user();

        // Check if the user has already liked the post
        if ($post->likes()->where('user_id', $user->id)->exists()) {
            return response()->json(['message' => 'You already liked this post.'], 400);
        }

        // Create a new like
        $post->likes()->create([
            'user_id' => $user->id,
        ]);

        return response()->json(['message' => 'Post liked successfully.']);
    }

    public function unlike(Post $post)
    {
        $user = auth()->user();

        // Remove the like
        $post->likes()->where('user_id', $user->id)->delete();

        return response()->json(['message' => 'Post unliked successfully!']);
    }
}
