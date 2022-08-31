<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Notice\CreateRequest;
use App\Models\Notice;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NoticeCreateController extends Controller
{
    public function NoticeCreateView()
    {
        return view('NoticeCreate.createview');
    }

    public function NoticeStore(CreateRequest $request)
    {
        // ログインしているユーザーIDを取得
        $user_id = Auth::id();
        // 入力された文章を取得
        $content = $request->input('content');
        $image = $request->file('image_path');
        $date = Carbon::now();
        // 文章と画像の両方を保存
        if(isset($image)){
            $path = $image->store('images', 'public');
            if($path){
                // DBに登録する処理
                Notice::create([
                    'content' => $content,
                    'image_path' => $path,
                    'user_id' => $user_id,
                    'created_at' => $date,
                    'updated_at' => $date
                ]);
            }
        }else{
            // 画像が選択されていない場合は文章のみを保存
            // DBに登録する処理
            Notice::create([
                'content' => $content,
                'image_path' => null,
                'user_id' => $user_id,
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
        return redirect()->route('Chat.chat');
    }
}
