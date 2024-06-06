<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [PostController::class, 'index'])->name("home");

// Laravel Jetstream routes
require __DIR__.'/jetstream.php';

//Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::resource("posts", PostController::class);

Route::resource("comments", CommentController::class)->only([ "store","update","destroy" ]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::delete('/api/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth');
Route::patch('/api/comments/{comment}', [CommentController::class, 'update']);



