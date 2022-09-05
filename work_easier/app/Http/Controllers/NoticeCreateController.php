<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Notice\CreateRequest;
use App\Models\Notice;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Services\NoticeService;

class NoticeCreateController extends Controller
{
    public function NoticeCreateView()
    {
        return view('NoticeCreate.createview');
    }

    public function NoticeStore(CreateRequest $request, NoticeService $notice_service)
    {
        // ログインしているユーザーIDを取得
        // $user_id = Auth::id();
        // // 入力された文章を取得
        // $content = $request->input('content');
        // $date = Carbon::now();
        // Notice::create([
        //     'content' => $content,
        //     'user_id' => $user_id,
        //     'created_at' => $date,
        //     'updated_at' => $date
        // ]);

        $notice_service->saveNotice(
            $request->UserID(),
            $request->notice(),
            $request->images()
        );
        return redirect()->route('Chat.chat');
    }
}
