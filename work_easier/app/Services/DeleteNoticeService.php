<?php

namespace App\Services;

use App\Models\Notice;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteNoticeService
{
    public function deleteNotice(int $notice_id)
    {
        DB::transaction(function () use ($notice_id){
            $notice = Notice::where('id', $notice_id)->firstOrFail();
            $notice->images()->each(function ($image) use ($notice){
                $filePath = 'public/images/' . $image->image_name;
                if(Storage::exists($filePath)){
                    Storage::delete($filePath);
                }
                $notice->images()->detach($image->id);
                $image->delete();
            });
            $notice->delete();
        });
    }
}