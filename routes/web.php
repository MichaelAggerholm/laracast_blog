<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\NewsletterController;

// RUN APP WITH : php -S localhost:8000 -t public
// Sæt 'FILESYSTEM_DRIVER=public' i .env!

Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostsController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/create', [PostsController::class, 'create'])->middleware('admin')->name('createPost');
Route::post('admin/posts', [PostsController::class, 'store'])->middleware('admin');


Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
