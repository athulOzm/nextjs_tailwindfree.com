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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::post('/category/drop', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');


