<?php 
namespace App\Services;

use App\Models\Document;
use App\Models\DocumentTag;

class DocumentDetailService
{
    public function GetDocument()
    {
        return Document::with('tags')->orderBy('created_at', 'DESC')->get();
    }

    public function GetDocumentID($document_id)
    {
        return Document::with('tags')->find($document_id);
    }
}