<?php

use App\Http\Controllers\NewsCategoryController;
use App\Http\Livewire\News\Categories;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Route;

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
Route::get('/', Categories::class);
Route::get('/news', Categories::class)->name('news.articles');
Route::get('/categories', Categories::class)->name('news.categories');
// Route::resource('categories', NewsCategoryController::class)
//     ->only(['index', 'show']);
// Route::get('/', function () {
//     return view('welcome');
// });
