<?php

use App\Http\Controllers\NewsCategoryController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\News\Index;
use App\Http\Livewire\News\Article;
use App\Http\Livewire\News\Articles;
use App\Http\Livewire\News\Categories;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', Index::class)->name('home');
Route::get('/news', Index::class);
Route::get('/categories', Categories::class)->name('news.categories');
Route::get('/articles', Articles::class)->name('news.articles');
Route::get('/article/{id?}', Article::class)->name('news.article');
Route::get('/auth/{action}', Login::class)->name('auth');
// Route::resource('categories', NewsCategoryController::class)
//     ->only(['index', 'show']);
// Route::get('/', function () {
//     return view('welcome');
// });
