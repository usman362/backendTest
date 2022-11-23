<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('article/detail/{id}', [HomeController::class, 'show'])->name('single');

Auth::routes();



Route::get('articles',[ArticleController::class,'index'])->name('article.index');

Route::get('article/create',[ArticleController::class,'create'])->name('article.create');

Route::post('article/store',[ArticleController::class,'store'])->name('article.store');

Route::get('article/delete/{id}',[ArticleController::class,'destroy'])->name('article.delete');



