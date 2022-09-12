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
        $notice_service->saveNotice(
            $request->UserID(),
            $request->notice(),
            $request->images()
        );
        return redirect()->route('Chat.chat');
    }
}
