<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class RepostController extends Controller
{
    public function repost(Post $post)
    {
        $user = auth()->user();

        // Check if the user already reposted the post
        if ($post->reposts()->where('user_id', $user->id)->exists()) {
            return response()->json(['message' => 'You already reposted this post'], 400);
        }

        // Add a repost
        $post->reposts()->create([
            'user_id' => $user->id,
        ]);

        return response()->json(['message' => 'Post reposted successfully!']);
    }
}
