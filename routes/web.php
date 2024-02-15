<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    // トップページの表示
    Route::get('/', 'index')->name('index');
    // 新規投稿作成
    Route::get('/posts/create', 'create')->name('create');
    // 新規投稿の保存
    Route::post('/posts', 'store')->name('store');
    // 既存の投稿詳細画面を表示 
    Route::get('/posts/{post}', 'show')->name('show');
    // 編集画面の表示
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
    // 投稿編集の保存
    Route::put('/posts/{post}', 'update')->name('update');
    // 投稿の削除
    Route::delete('/posts/{post}', 'delete')->name('delete');
    // いいね機能 
    Route::get('/posts/favorite/{post}', 'favorite')->name('favorite');
    // いいねを外す
    Route::get('/posts/unfavorite/{post}', 'unfavorite')->name('unfavorite');
});


Route::controller(GameController::class)->middleware(['auth'])->group(function(){
    // Gameごとのトップページ表示
    Route::get('/games','index')->name('games.index');
    // Gameごとの投稿一覧
    Route::get('/game_posts/{game}','game_posts');
    // Game詳細画面
    Route::get('/games/{game}', 'show');
});


Route::controller(CommentController::class)->middleware(['auth'])->group(function(){
    // コメントの投稿
    Route::post('/posts/comment/store','store')->name('comment.store');
    // コメントの削除
    Route::delete('/posts/comments/{comment}', 'delete')->name('comment.delete');
    // コメントの編集画面の表示
    Route::get('/comments/{comment}/edit', 'edit')->name('comment.edit');
    // コメントの編集保存
    Route::put('/posts/comment/{comment}', 'update')->name('comment.update');
});


Route::controller(UserController::class)->middleware(['auth'])->group(function(){
    // ユーザー一覧
    Route::get('/users', 'index')->name('users.index');
    // フォローする・外す
    Route::post('/users/follow', 'follow')->name('users.follow');
    // つながりをみる
    Route::get('/users/list', 'list')->name('users.list');
    // ユーザーごとの投稿
    Route::get('/user_posts/{user}','user_posts');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';