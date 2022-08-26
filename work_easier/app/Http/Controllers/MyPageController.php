<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function UserMyPageView($user_id)
    {
        $user_id = Auth::id();
        return view('MyPage.mypage', ['user_id' => $user_id]);
    }
}
