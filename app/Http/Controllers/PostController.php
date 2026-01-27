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
            'content' => 'required',
            'category_id' => 'required'

        ]);

        post::create($validated);

        return redirect()->route('posts.index');
    }

    public function edit(post $post)
    {
        $categories = category::all();
        return view('admin.edit-post', compact('post','categories'));
    }

    public function update(Request $request, post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'content' => 'required',
            'category_id' => 'required'

        ]);

        $validated['completed'] = $request->has('completed');

        $post->update($validated);

        $request->session()->flash('success', 'Post was edited!');

        return redirect()->route('posts.index');
    }


    public function destroy(post $post, Request $request)
    {
        $post->delete();

        $request->session()->flash('success', 'Post was deleted!');

        return redirect()->route('posts.index');
    }

    public function read() {}
}
