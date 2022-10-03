<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Services\DocumentDetailService;

class PDFFileController extends Controller
{
    // コントローラーを分ける
    public function DocumentPDF($document_id)
    {
        $service = new DocumentDetailService();
        $document = $service->GetDocumentID($document_id);
        return view('DocumentDetail.PDF', ['document' => $document]);
    }
}
