<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $posts = post::paginate(3);
        $categories = category::all();
        return view('index', compact('posts', 'categories'));
    }

    public function show($id)
    {
        $post = post::find($id);
        return view('post', compact('post'));
    }

    public function edit($id)
    {
        if ($id === "All") {
            $posts = post::all();
        } else {
            $posts = post::all()->where('category_id', $id);
        }
        $categories = category::all();
        return view('index', compact('posts', 'categories'));
    }
}
