<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/admin-dashboard', function(){
    return view('admin.admin-dashboard');
});

Route::get('/admin-posts', function(){
    return redirect()->route('posts.index');
});

Route::get('/admin-categories', function(){
    return redirect()->route('categories.index');
});

Route::get('/admin-users', function(){
    return view('admin.admin-users');
});




Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
