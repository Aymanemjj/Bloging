<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/admin-dashboard', function(){
    return view('admin-dashboard');
});

Route::get('/admin-posts', function(){
    return view('admin-posts');
});

Route::get('/admin-categories', function(){
    return view('admin-categories');
});

Route::get('/admin-users', function(){
    return view('admin-users');
});