<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Services\NoticeService;

class ChatController extends Controller
{
    public function GeneralReport()
    {
        $notice_service = new NoticeService();
        $notices = $notice_service->getNotices();
        return view('Chat.chat')->with('notices', $notices);
    }
}
