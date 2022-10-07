<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <x-sharing.bootstrap></x-sharing.bootstrap>
        <title>DocumentList</title>
    </head>
    <body>
        <x-document_list.menu></x-document_list.menu>
        <div class="mt-5">
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
            <div class="d-flex justify-content-center">
                {{ $documents->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </body>
</html>