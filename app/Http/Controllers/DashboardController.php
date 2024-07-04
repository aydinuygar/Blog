<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            
            $posts = Post::orderBy('created_at', 'desc')->simplePaginate(6);

            return view('dashboard', compact('posts'));
        }
        return redirect()->route('login');
    }
}
