<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSetting;
use App\Models\User;

class WorkingStateListController extends Controller
{
    public function StaffStateList()
    {
        $users = User::all();
        // スタッフの勤務状態のviewを返す
        return view('WorkingStateList.working_state_list', ['users' => $users]);
    }
}
