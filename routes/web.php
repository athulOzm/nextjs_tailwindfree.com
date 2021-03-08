<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     return redirect('/login/');
});


Auth::routes(['register' => false]);





Route::middleware(['auth:web'])->group(function () {
    
     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
     //category 
     Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
     Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
     Route::delete('/category/drop', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');

     //post
     Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
     Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
     Route::delete('/post/drop', [App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');
     Route::get('/post/edit/{post}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
});


