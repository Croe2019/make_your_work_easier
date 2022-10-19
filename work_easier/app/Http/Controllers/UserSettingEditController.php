<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSetting;
use App\Http\Requests\UserSetting\Edit\EditRequest;
use App\Models\User;
use App\Services\EditUserSetting;

class UserSettingEditController extends Controller
{
    public function EditView($user_id)
    {
        // ログイン中のユーザーIDを取得
        $user_id = Auth::id();
        // ログイン中のユーザー情報を取得
        $user = User::where('id', $user_id)->first();
        return view('UserSettingEdit.usersettingedit', ['user_id' => $user_id, 'user' => $user]);
    }

    // TODO ここから再開
    public function Update($user_id, EditRequest $request, EditUserSetting $service)
    {
        // ログインしているユーザーのidを取得
        $user_id  = Auth::id();
        $service->EditSaveUserSetting($user_id, $request->UserName(), $request->UserStatus(), $request->UserImage());

        // リダイレクト
        return redirect()->route('UserSettingEdit.edit', ['user_id' => $user_id])->with('feedback.success', "ユーザー設定を更新しました");
    }
}
