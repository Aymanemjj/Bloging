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
    return view('admin.admin-posts');
});

Route::get('/admin-categories', function(){
    return view('admin.admin-categories');
});

Route::get('/admin-users', function(){
    return view('admin.admin-users');
});



/* Route::resource('categories', CategoryController::class);
 */

Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
