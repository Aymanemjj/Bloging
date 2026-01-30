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
        $categories = category::all();
        $post = post::find($id);
        return view('post', compact('post','categories'));
    }

    public function edit($id)
    {
        if ($id === "all") {
            $posts = post::paginate(5);
        } else {
            $posts = post::where('category_id', $id)->paginate(5);
        }
        $categories = category::all();
        return view('index', compact('posts', 'categories'));
    }
}
