<?php

namespace App\Http\Controllers\Notice\Update;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\NoticeImage;
use App\Services\EditNoticeService;

class IndexController extends Controller
{
    public function Index($notice_id)
    {
        $edit_notice_service = new EditNoticeService();
        $notice = $edit_notice_service->getEditNotice($notice_id);
        return view('NoticeUpdate.update', ['notice' => $notice]);
    }
}
