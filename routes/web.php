<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;

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


Auth::routes();

Route::group(['middleware' => 'auth'], function () {

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//本の作成
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');

//本の登録
Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');

//本の詳細
Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');

//それぞれの投稿一覧
Route::get('/show/{user_id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');

//本の編集
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');

//本の更新
Route::post('/update', [App\Http\Controllers\HomeController::class, 'update'])->name('update');

//本の削除
Route::post('/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');

//検索フォーム
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

//コメント作成
Route::get('/comment/create', [App\Http\Controllers\CommentController::class, 'create'])->name('comment.create');

//コメントの登録
Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

//いいね機能
Route::post('posts/{post}/favorites', [App\Http\Controllers\FavoriteController::class, 'store'])->name('favorites');

//いいねを外す機能
Route::post('posts/{post}/unfavorites', [App\Http\Controllers\FavoriteController::class, 'destroy'])->name('unfavorites');
});