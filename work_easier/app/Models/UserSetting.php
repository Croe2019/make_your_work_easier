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
}
