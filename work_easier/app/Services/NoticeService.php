<?php

namespace App\Services;

use App\Models\Notice;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NoticeService
{
    public function getNotices()
    {
        return Notice::with('images')->orderBy('created_at', 'DESC')->get();
    }

    public function saveNotice(int $user_id, string $content, array $images)
    {
        DB::transaction(function () use ($user_id, $content, $images){
            $notice = new Notice();
            $notice->user_id = $user_id;
            $notice->content = $content;
            $notice->save();
            foreach($images as $image)
            {
                Storage::putFile('public/images', $image);
                $imageModel = new Image();
                $imageModel->image_name = $image->hashName();
                $imageModel->save();
                $notice->images()->attach($imageModel->id);
            }
        });
    }
}