<?php

namespace App\Http\Controllers\Notice\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Notice\UpdateRequest;
use App\Models\Notice;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PutController extends Controller
{
    // 後でリファクタリングでモデルクラスに処理を記述すること
    public function Update($notice_id, UpdateRequest $request)
    {
        $notice = Notice::find($notice_id);
        $user_id = Auth::id();
        $date = new Carbon();
        $content = $request->input('content');

        $notice->content = $content;
        $notice->user_id = $user_id;
        $notice->created_at = $date->now();
        $notice->updated_at = $date->now();
        $notice->save();

        return redirect()->route('NoticeUpdate.update', ['notice_id' => $notice_id])
        ->with('feedback.success', "お知らせを編集しました");
    }
}
