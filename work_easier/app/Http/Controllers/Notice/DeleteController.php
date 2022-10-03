<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Services\DeleteNoticeService;

class DeleteController extends Controller
{
    public function Delete(Request $request, DeleteNoticeService $notice_service)
    {
        $notice_id = (int) $request->route('notice_id');
        
        $notice_service->deleteNotice($notice_id);
        return redirect()->route('Chat.chat')->with('feedback.success', "お知らせを削除しました");
    }
}
