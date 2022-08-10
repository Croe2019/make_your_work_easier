<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\NoticeCreateController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// 一番最初に表示される画面のルート
Route::get('/', [HomeController::class, 'Home'])->name('home.home');
// ログイン後遷移する画面
Route::get('/chat', [ChatController::class, 'GeneralReport'])->name('Chat.chat');
// お知らせ作成画面
Route::get('/noticecreate', [NoticeCreateController::class, 'NoticeCreateView'])->name('NoticeCreate.createview');
Route::post('/notice/create', [NoticeCreateController::class, 'NoticeStore'])->name('store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
