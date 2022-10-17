<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Services\NoticeService;
use App\Models\NoticeImage;
use App\Models\UserSetting;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Notice\CreateRequest;

class ChatController extends Controller
{
    public function GeneralReport()
    {
        $notice_service = new NoticeService();
        $notices = $notice_service->getNotices();
        // ログイン中のユーザーidを取得
        $user_id = Auth::id();
        
        // お知らせを投稿したユーザーidを取得
        return view('Chat.chat', ['notices' => $notices, 'user_id' => $user_id]);
    }
}
