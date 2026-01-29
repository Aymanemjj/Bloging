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

/*         public function show()
    {
        $categories = category::all();
        return view('admin.admin-categories', compact('categories'));
    } */

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

        $request->session()->flash('success', 'Category was created!');

        return redirect()->route('categories.index');
    }

    public function edit(category $category)
    {
        
        return view('admin.edit-category', compact('category'));
    }

    public function update(Request $request, category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $validated['completed'] = $request->has('completed');

        $category->update($validated);

        $request->session()->flash('success', 'Category was edited!');

        return redirect()->route('categories.index');
    }


    public function destroy(category $category, Request $request)
    {
        $category->delete();

        $request->session()->flash('success', 'Category was deleted!');

        return redirect()->route('categories.index');
    }
}
