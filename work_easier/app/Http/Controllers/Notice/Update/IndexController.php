<?php

namespace App\Http\Controllers\Notice\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class IndexController extends Controller
{
    public function Index(Request $request)
    {
        $notice_id = (int) $request->route('notice_id');
        $notice = Notice::where('id', $notice_id)->firstOrFail();
        //dd($notice);
        return view('NoticeUpdate.update', ['notice' => $notice]);
    }
}
