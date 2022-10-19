<?php 
namespace App\Services;

use App\Models\Notice;
use Carbon\Carbon;
use App\Models\Image;
use App\Models\User;
use App\Models\NoticeImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EditUserSetting
{
    public function getEditUserID($user_id)
    {
        return User::where('id', $user_id)->first();
    }

    public function EditSaveUserSetting(int $user_id, string $user_name, int $user_status_number, $profile_image)
    {
        DB::transaction(function () use ($user_id, $user_name, $user_status_number, $profile_image){
            $user = User::where('id', $user_id)->firstOrFail();

            if($profile_image != null){
                $path = Storage::putFile('public/profile_image', $profile_image);
                if($path){
                    User::where('id', $user->id)->update([
                        'name' => $user_name,
                        'email' => $user->email,
                        'password' => $user->password,
                        'user_status' => $user_status_number,
                        'user_image' => $path,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }else if($profile_image == null){
                $profile_image = $user->user_image;
                User::where('id', $user->id)->update([
                    'name' => $user_name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'user_status' => $user_status_number,
                    'user_image' => $profile_image,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        });
    }
}