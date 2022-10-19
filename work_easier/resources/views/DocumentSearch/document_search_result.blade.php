<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <x-sharing.bootstrap></x-sharing.bootstrap>
        <title>DocumentSearchResult</title>
    </head>
    <body>
        <x-sharing.menu></x-sharing.menu>
        <div class="mt-5">
            @if($documents->count())
                <table class="table table-hover">
                    <thead class="table">
                        <tr>
                        <th scope="col" class="text-center">資料名</th>
                        <th scope="col" class="text-center">作成日</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $document)
                            <tr>
                                <td class="text-center"><a href="{{ route('DocumentDetail.document_detail', $document->id) }}">{{ $document->document_name }}</a></td>
                                <td class="text-center">{{ $document->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <x-not_search_document_result.not_search_document_result></x-not_search_document_result.not_search_document_result>
            @endif
            <div class="d-flex justify-content-center">
                {{ $documents->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </body>
</html>