<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
        public function index()
    {
        $categories = category::all();
        return view('admin.admin-categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.new-category');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        category::create($validated);

        return redirect()->route('categories.index');
    }

}
