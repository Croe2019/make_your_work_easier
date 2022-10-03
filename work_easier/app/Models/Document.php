<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = "documents";
    protected $fillable = ['document_name', 'user_id' ,'document_path', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function tags()
    {
        // TODO ここから再開
        return $this->belongsToMany(Tag::class, 'document_tags')->using(DocumentTag::class);
    }
}
