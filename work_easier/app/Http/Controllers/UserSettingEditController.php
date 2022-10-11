<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSetting;
use App\Http\Requests\UserSetting\Edit\EditRequest;
use App\Models\User;

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

    public function Update($user_id, EditRequest $request)
    {
        // ログインしているユーザーのidを取得
        // ここはリファクタリングでモデルクラスに処理を移してControllerでは呼び出すだけにする
        $user_id  = Auth::id();
        $user = User::where('id', $user_id)->first();

        $user_name = $request->input('name');
        $user_status_number = $request->input('user_status');
        $user_image = $request->file('user_image');

        if(isset($user_image)){
            $path = $user_image->store('profile_image', 'public');
            if($path){
                User::where('id', $user_id)->update([
                    'name' => $user_name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'user_image' => $path,
                    'user_status' => $user_status_number,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                
            }
        }else{
            // 画像を変更しないままユーザー名、勤務状態を変更した時の送信処理
            User::where('id', $user_id)->update([
                'name' => $user_name,
                'email' => $user->email,
                'password' => $user->password,
                'user_image' => $user->user_image,
                'user_status' => $user_status_number,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // リダイレクト
        return redirect()->route('UserSettingEdit.edit', ['user_id' => $user_id])->with('feedback.success', "ユーザー設定を更新しました");
    }
}
