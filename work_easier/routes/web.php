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
use App\Http\Controllers\MultImageSelectController;
use App\Http\Controllers\DocumentCreating\DocumentCreatingController;
use App\Http\Controllers\DocumentListController;
use App\Http\Controllers\DocumentDetailController;
use App\Http\Controllers\PDFFileController;
use App\Http\Controllers\DocumentSearchController;
use App\Models\Document;

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
    // マイページ
    Route::get('/mypage/{user_id}', [MyPageController::class, 'UserMyPageView'])->name('MyPage.mypage');
    // ユーザー情報編集画面
    Route::get('/usersettingedit/{user_id}', [UserSettingEditController::class, 'EditView'])->name('UserSettingEdit.edit');
    Route::post('/usersettingedit/{user_id}', [UserSettingEditController::class, 'Update'])->name('update');

    // お知らせ更新処理画面
    Route::get('/notice/update/{notice_id}', [IndexController::class, 'Index'])->name('NoticeUpdate.update');
    Route::post('/notice/update/{notice_id}', [PutController::class, 'Update'])->name('Notice.Update');
    // 削除処理ルーティング
    Route::delete('/notice/delete/{notice_id}', [DeleteController::class, 'Delete'])->name('Notice.delete');

    // 資料保存ルーティング
    Route::get('/document/creating', [DocumentCreatingController::class, 'DocumentCreatingView'])->name('DocumentCreating.document_creating');
    Route::post('/document/creating', [DocumentCreatingController::class, 'DocumentStore'])->name('document_store');

    // 資料一覧画面
    Route::get('/document/list', [DocumentListController::class, 'DocumentList'])->name('DocumentList.document_list');
    // 資料詳細ページ
    Route::get('/document/detail/{document_id}', [DocumentDetailController::class, 'DocumentDetail'])->name('DocumentDetail.document_detail')->where('document_id', '[0-9]+');
    // PDFファイル表示表ページ
    Route::get('/pdf/{document_id}', [PDFFileController::class, 'DocumentPDF'])->name('DocumentDetail.PDF');
    // 資料検索
    Route::get('/document/search', [DocumentSearchController::class, 'DocumentSearch'])->name('DocumentSearch.document_search_result');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
