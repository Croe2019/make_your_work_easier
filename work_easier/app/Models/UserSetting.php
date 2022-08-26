<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserSetting\Edit\EditRequest;

class UserSetting extends Model
{
    use HasFactory;
    protected $table = 'user_settings';
    protected $fillable = ['user_name', 'user_profile_image', 'user_status' ,'user_id','created_at', 'updated_at'];

    // public function UserUpdate($request, $user_setting)
    // {
    //     // ユーザー名、プロフィール画像、勤務ステータスをDBに保存
    //     $result = $user_setting->fill([
    //         'user_name' => $request->user_name, 
    //         'user_profile_image' => $request->user_profile_image, 
    //         'user_status' => $request->user_status,
    //         'user_id' => $request->user_id,
    //         'created_at' => now(), 
    //         'updated_at' => now()
    //     ])->save();
    //     return $result;
    // }
}
