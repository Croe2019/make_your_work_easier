<?php 
namespace App\Services;

use App\Models\Notice;
use Carbon\Carbon;
use App\Models\Image;
use App\Models\NoticeImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EditNoticeService
{
    public function getEditNotice($notice_id)
    {
        return Notice::with('images')->find($notice_id);
    }

    public function editSaveNotice(int $notice_id, string $content, array $images)
    {
        DB::transaction(function () use ($notice_id, $content, $images){
            $notice = Notice::where('id', $notice_id)->firstOrFail();
            $notice->images()->each(function ($image) use ($notice){
                $filePath = 'public/images/' . $image->image_name;
                if(Storage::exists($filePath)){
                    Storage::delete($filePath);
                }
                $notice->images()->detach($image->id);
                $image->delete();
            });
            // 一度削除した後、再度作り直し
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