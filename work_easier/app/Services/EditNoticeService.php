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

    public function editSaveNotice(int $notice_id, string $content, array $images = null)
    {
        DB::transaction(function () use ($notice_id, $content, $images){
            $notice = Notice::where('id', $notice_id)->firstOrFail();

            if(isset($images)){
                $notice->images()->each(function ($image) use ($notice){
                    $filePath = 'public/images/' . $image->image_name;
                    // ファイルパスに画像があり、変更しない場合return
                    if(Storage::exists($filePath)){
                        $notice->images()->detach($image->id);
                        $image->delete();
                    }
                });
                // 一度削除した後、再度作り直し
                $notice->content = $content;
                $notice->save();
                foreach((array)$images as $image)
                {
                    Storage::putFile('public/images', $image);
                    $imageModel = new Image();
                    $imageModel->image_name = $image->hashName();
                    $imageModel->save();
                    $notice->images()->attach($imageModel->id);
                }
            }

            if(empty($images)){
                $notice->images()->each(function ($image) use ($notice){
                    $filePath = 'public/images/' . $image->image_name;
                    // ファイルパスに画像があり、変更しない場合return
                    if(Storage::exists($filePath)){
                        return;
                    }
                });
                // 一度削除した後、再度作り直し
                $notice->content = $content;
                $notice->save();
            }
        });
    }
}