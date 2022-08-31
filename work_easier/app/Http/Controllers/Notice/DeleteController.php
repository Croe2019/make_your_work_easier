<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class DeleteController extends Controller
{
    public function Delete($notice_id)
    {
        $notice = Notice::find($notice_id);
        $notice->delete();
        return redirect()->route('Chat.chat')->with('feedback.success', "お知らせを削除しました");
    }
}
