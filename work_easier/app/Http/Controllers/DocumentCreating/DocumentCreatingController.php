<?php

namespace App\Http\Controllers\DocumentCreating;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Document\CreateRequest;
use App\Services\DocumentService;

class DocumentCreatingController extends Controller
{
    public function DocumentCreatingView()
    {
        return view('DocumentCreating.document_creating');
    }

    public function DocumentStore(CreateRequest $request, DocumentService $service)
    {
        $service->SaveDocument($request->UserID(), $request->document(), $request->DocumentFile(), $request->tags($request));
        // 保存が成功したらリダイレクト
        return redirect()->route('DocumentCreating.document_creating')->with('feedback.success', "資料を保存しました");
    }
}
