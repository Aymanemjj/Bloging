<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\post;
 use \Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::all();
        $categories = category::all();
        
        return view('admin.admin-posts', compact('posts','categories'));
    }


    
/*         public function index()
    {
        $posts = DB::table('posts')
        ->join('categories', 'posts.category_id', '=', 'categories.id')
        ->select('posts.*', 'categories.name AS category')
        ->get();
        
        return view('admin.admin-posts', compact('posts'));
    }
 */
/*     public function home()
    {
        $posts = post::all();
        return view('index', compact('posts'));
    } */

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
        $categories = category::all()->where('id', '!=', $post->category_id);
        $oldCategory = category::find($post->category_id);
        return view('admin.edit-post', compact('post','categories','oldCategory'));
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

}
