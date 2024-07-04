<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(6);
        return view('posts.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $validatedData = $request->validated();
        if (!$validatedData) {
            return back()->withErrors(['message' => 'The data provided is not valid.'])->withInput();
        }
        Post::create($validatedData);

        return redirect()->route('dashboard')
            ->with('success', 'Post created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {   
        $tags = Tag::all(); //düzeltilecek
        return view('posts.show', compact('post','tags'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return redirect()->route('dashboard')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Post deleted successfully.');
    }

   

}
