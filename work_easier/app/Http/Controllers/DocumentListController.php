<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Services\DocumentDetailService;
use App\Models\Tag;
use App\Services\DocumentService;
use Illuminate\Support\Facades\DB;

class DocumentListController extends Controller
{
    public function DocumentList()
    {
        $service = new DocumentService();
        $documents = $service->GetDocument();
        return view('DocumentList.document_list', ['documents' => $documents]);
    }
}
