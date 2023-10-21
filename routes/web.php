<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('articles',[ArticleController::class,'index'])->name('article.index');

Route::post('article/store',[ArticleController::class,'store'])->name('article.store');

Route::get('article/delete/{id}',[ArticleController::class,'destroy'])->name('article.delete');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
