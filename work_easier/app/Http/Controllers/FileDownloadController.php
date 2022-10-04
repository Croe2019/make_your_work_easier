<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class FileDownloadController extends Controller
{
    public function Download($document_id)
    {
        $document_name = Document::find($document_id, ['document_path']);
        // TODO ここから再開
       return Storage::download($document_name);
    }
}
