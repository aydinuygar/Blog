<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;


class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(6);
        $tags = Tag::all(); // Tüm etiketleri çekiyoruz
        return view('welcome', compact('posts', 'tags'));

    }
}
