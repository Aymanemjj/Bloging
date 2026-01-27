<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::all();
        return view('index', compact('posts'));
    }

    public function table()
    {
        $posts = post::all();
        return view('admin.admin-posts', compact('posts'));
    }

    public function create()
    {
        $categories = category::all();
        return view('admin.new-post', compact('categories'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'content' => 'required'
            
        ]);

        post::create($validated);

        return redirect()->route('posts.index');
    }
}
