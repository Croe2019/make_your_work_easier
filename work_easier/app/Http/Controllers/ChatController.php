<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class ChatController extends Controller
{
    public function GeneralReport()
    {
        $notices = Notice::latest('created_at')->get();
        return view('Chat.chat')->with('notices', $notices);
    }
}
