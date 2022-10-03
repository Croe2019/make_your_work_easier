<?php

namespace App\Services;

use App\Models\Document;
use Carbon\Carbon;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Document\CreateRequest;
use Illuminate\Support\Facades\Storage;

class DocumentService
{
    public function GetDocument()
    {
        return Document::with('tags')->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function SaveDocument(int $user_id, string $document_name, $document_file, array $tags)
    {
        DB::transaction(function () use ($user_id, $document_name, $document_file, $tags){
            $document = new Document();
            $document->user_id = $user_id;
            $document->document_name = $document_name;
            Storage::putFile('public/documents', $document_file);
            $document->document_path = $document_file->hashName();
            $document->save();
             // DBに登録する処理
             foreach($tags as $tag)
             {
                 $tag_model = new Tag();
                 $tag_model->name = trim($tag);
                 $tag_model->save();
                 $document->tags()->attach($tag_model->id);
             }
        });
    }
}