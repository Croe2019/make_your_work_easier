<?php

namespace App\Http\Controllers\Notice\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Notice\UpdateRequest;
use App\Models\Notice;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Services\EditNoticeService;

class PutController extends Controller
{
    // 後でリファクタリングでモデルクラスに処理を記述すること
    public function Update($notice_id, UpdateRequest $request, EditNoticeService $edit_notice_service)
    {
        $edit_notice_service->editSaveNotice($notice_id, $request->notice(), $request->images());

        return redirect()->route('NoticeUpdate.update', ['notice_id' => $notice_id])
        ->with('feedback.success', "お知らせを編集しました");
    }
}
