<?php

namespace App\Http\Controllers\UserSetting\Edit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserSetting\Edit\EditRequest;
use App\Models\UserSetting;

class EditController extends Controller
{

    public function __construct()
    {
        $this->user_setting = new UserSetting();
    }
}
