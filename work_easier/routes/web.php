<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\NoticeCreateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\UserSettingEditController;
use App\Http\Controllers\UserSetting\Edit\EditController;
use App\Http\Controllers\Notice\Update\IndexController;
use App\Http\Controllers\Notice\Update\PutController;
use App\Http\Controllers\Notice\DeleteController;

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

// ログイン前の画面
Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'Home'])->name('home.home');
});

// ログインしているユーザーのみ利用可能
Route::middleware('auth')->group(function () {
    // ログイン後遷移する画面
    Route::get('/chat', [ChatController::class, 'GeneralReport'])->name('Chat.chat');
    // お知らせ作成画面
    Route::get('/noticecreate', [NoticeCreateController::class, 'NoticeCreateView'])->name('NoticeCreate.createview');
    Route::post('/notice/create', [NoticeCreateController::class, 'NoticeStore'])->name('store');
    Route::get('/mypage/{user_id}', [MyPageController::class, 'UserMyPageView'])->name('MyPage.mypage');
    Route::get('/usersetting/{user_id}', [UserSettingController::class, 'UserSettingView'])->name('UserSetting.usersetting');
    Route::post('/usersetting/{user_id}/store', [UserSettingController::class, 'UserStatusDataStore'])->name('userstatus.store');
    Route::get('/usersettingedit/{user_id}', [UserSettingEditController::class, 'EditView'])->name('UserSettingEdit.edit');
    Route::post('/usersettingedit/{user_id}', [UserSettingEditController::class, 'Update'])->name('update');

    // お知らせ更新処理画面
    Route::get('/notice/update/{notice_id}', [IndexController::class, 'Index'])->name('NoticeUpdate.update');
    Route::post('/notice/update/{notice_id}', [PutController::class, 'Update'])->name('Notice.Update');
    // 削除処理ルーティング
    Route::delete('/notice/delete/{notice_id}', [DeleteController::class, 'Delete'])->name('Notice.delete');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
