<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Notice\CreateRequest;

class Notice extends Model
{
    use HasFactory;
    protected $table = 'notices';
    protected $fillable = ['content', 'user_id','created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'notice_images')->using(NoticeImage::class);
    }
}
