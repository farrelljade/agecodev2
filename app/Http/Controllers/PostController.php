<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['posts'] = Post::query()
            ->withCount('likes')
            ->with('user')
            ->latest()
            ->get()
            ->map(function ($post) {
                $post->isLiked = $post->likes->contains('user_id', auth()->id());
                return $post;
    });

        return Inertia::render('Posts/PostsPage', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate request data
        $validated = $request->validate([
            'content' => ['required', 'string', 'min:10', 'max:255'],
        ]);

        // create new post
        Post::query()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
