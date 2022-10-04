<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Services\DocumentDetailService;

class DocumentDetailController extends Controller
{
    // コントローラーを分ける
    public function DocumentDetail($document_id)
    {
        // 資料ファイルを取得
        $file_name = Document::find($document_id, ['document_path']);
        //dd($file_name);
        $service = new DocumentDetailService();
        $document = $service->GetDocumentID($document_id);
        return view('DocumentDetail.document_detail', ['document' => $document, 'file_name' => $file_name]);
    }
}
