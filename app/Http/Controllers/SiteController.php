<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $posts = post::all();
        return view('index', compact('posts'));
    }

    public function show($id){
        $post= post::find($id);
        return view('post',compact('post'));
    }

    public function filter(){
        $posts = post::find();
        return view('index',compact('posts'));
    }
}
