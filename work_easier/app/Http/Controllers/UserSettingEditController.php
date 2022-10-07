<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSetting;
use App\Http\Requests\UserSetting\Edit\EditRequest;

class UserSettingEditController extends Controller
{
    public function EditView($user_id)
    {
        // ログイン中のユーザーIDを取得
        $user_id = Auth::id();
        // ログイン中のユーザー情報を取得
        $user = UserSetting::where('user_id', $user_id)->first();
        //dd($user);
        return view('UserSettingEdit.usersettingedit', ['user_id' => $user_id, 'user' => $user]);
    }

    public function Update($user_id, EditRequest $request)
    {
        // ログインしているユーザーのidを取得
        // ここはリファクタリングでモデルクラスに処理を移してControllerでは呼び出すだけにする
        $user_id  = Auth::id();
        $user_name = $request->input('user_name');
        $user_status_number = $request->input('user_status');
        $user_image = $request->file('user_profile_image');

        if(isset($user_image)){
            $path = $user_image->store('profile_image', 'public');
            if($path){
                UserSetting::where('user_id', $user_id)->update([
                    'user_name' => $user_name,
                    'user_profile_image' => $path,
                    'user_status' => $user_status_number,
                    'user_id' => $user_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }else{
            // 画像を変更しないままユーザー名、勤務状態を変更した時の送信処理
            $user = UserSetting::where('user_id', $user_id)->first();
            UserSetting::where('user_id', $user_id)->update([
                'user_name' => $user_name,
                'user_profile_image' => $user->user_profile_image,
                'user_status' => $user_status_number,
                'user_id' => $user_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        //dd($user_edit_setting);
        // リダイレクト
        return redirect()->route('UserSettingEdit.edit', ['user_id' => $user_id])->with('feedback.success', "ユーザー設定を更新しました");
    }
}
