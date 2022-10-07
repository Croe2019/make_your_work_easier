<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentSearchController extends Controller
{
    public function DocumentSearch(Request $request)
    {
        $keyword = $request->input('keyword');

        if(!empty($keyword)){
            $query = Document::where('document_name', 'LIKE', "%{$keyword}%")
            ->orWhere('document_path', 'LIKE', "%{$keyword}%");
        }

        $documents = $query->paginate(5)->withQueryString();
        // 検索結果を返す
        return view('DocumentSearch.document_search_result', ['documents' => $documents, 'keyword' => $keyword]);
    }
}
