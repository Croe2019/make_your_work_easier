<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserSetting\UserSettingRequest;
use App\Models\UserSetting;

class UserSettingController extends Controller
{
    public function UserSettingView($user_id)
    {
        $user_id = Auth::id();
        //$user = DB::table('users')->find($user_id);
        return view('UserSetting.usersetting', ['user_id' => $user_id]);
    }

    // ユーザー情報をDBに保存する
    public function UserStatusDataStore($user_id, UserSettingRequest $request)
    {
        // ユーザーID、ユーザーを取得
        $user_id = Auth::id();
        // ここはリファクタリングでモデルクラスに処理を移してControllerでは呼び出すだけにする
        // ユーザー名、プロフィール画像、勤務ステータスをDBに保存
        $user_name = $request->input('user_name');
        $user_status_number = $request->input('user_status');
        $user_image = $request->file('user_profile_image');

        if(isset($user_image)){
            $path = $user_image->store('profile_image', 'public');
            if($path){
                // DBに登録する処理
                UserSetting::create([
                    'user_name' => $user_name,
                    'user_profile_image' => $path,
                    'user_status' => $user_status_number,
                    'user_id' => $user_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }else{
            // 画像が選択されていない場合は文章のみを保存
            // DBに登録する処理
            UserSetting::create([
                'user_name' => $user_name,
                'user_profile_image' => null,
                'user_status' => $user_status_number,
                'user_id' => $user_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        return redirect()->route('MyPage.mypage', ['user_id' => $user_id]);
    }
}
