<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\TagRequest;
use App\Models\Post;
use Carbon\Carbon;



class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->paginate(10);
        return view('tags.list', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $validatedData = $request->validated();
        if (!$validatedData) {
            return back()->withErrors(['message' => 'The data provided is not valid.'])->withInput();
        }
        Tag::create($validatedData);

        return redirect()->route('tags.index')
            ->with('success', 'Tag created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $tags = Tag::all(); //düzeltilecek
        $posts = $tag->posts()->paginate(10);
        return view('tags.show', compact('tag', 'posts', 'tags'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $validatedData = $request->validated();
        $tag->update($validatedData);

        return redirect()->route('tags.index')
                         ->with('success', 'Tag updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')
                         ->with('success', 'Tag deleted successfully.');
    }

    public function showPosts(Tag $tag)
    {
        $posts = $tag->posts()->paginate(10); 
        $allPosts = Post::all();


        return view('tags.hasposts', compact('tag', 'posts','allPosts' ));

    }


    public function updatePosts(Request $request, Tag $tag)
    {
        $selectedPosts = $request->input('posts', []);
        
        $currentPosts = $tag->posts->pluck('id')->toArray();
        
        $postsToAttach = array_diff($selectedPosts, $currentPosts);
        $postsToDetach = array_diff($currentPosts, $selectedPosts);
        
        foreach ($postsToAttach as $postId) {
            $tag->posts()->attach($postId, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }
        
        foreach ($postsToDetach as $postId) {
            $tag->posts()->detach($postId, ['updated_at' => Carbon::now()]);
        }
        
        return redirect()->route('tags.index', $tag->id)
            ->with('success', 'Posts updated successfully.');
    }



}
