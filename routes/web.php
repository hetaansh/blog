<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;



Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


Route::resource('admin/posts' , AdminController::class)->middleware('can:isAdmin');
//Route::post('admin/posts', [AdminController::class, 'store'])->middleware('can:isAdmin');
//Route::get('admin/posts/create', [AdminController::class, 'create'])->middleware('can:isAdmin');
//Route::get('admin/posts', [AdminController::class, 'index'])->middleware('can:isAdmin');
//Route::get('admin/posts/{post}/edit', [AdminController::class, 'edit'])->middleware('can:isAdmin');
//Route::patch('admin/posts/{post}', [AdminController::class, 'update'])->middleware('can:isAdmin');
//Route::delete('admin/posts/{post}', [AdminController::class, 'destroy'])->middleware('can:isAdmin');



