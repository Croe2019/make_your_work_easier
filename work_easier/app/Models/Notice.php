<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Notice\CreateRequest;

class Notice extends Model
{
    use HasFactory;
    protected $table = 'notices';
    protected $fillable = ['content', 'image_path', 'user_id','created_at', 'updated_at'];
}
