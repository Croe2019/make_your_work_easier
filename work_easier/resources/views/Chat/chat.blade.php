<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <x-chat.share></x-chat.share>
        <title>Notice</title>
    </head>
    <body>
        <x-chat.sidebar></x-chat.sidebar>
        <!-- ここにお知らせ一覧を表示させる -->
        <hr>
        <div class="mt-5">
            @foreach($notices as $notice)
                <p>{{ $notice->content }}</p>
                <p><img src="{{ Storage::url($notice->image_path) }}" width="25%"></p>
                <hr>
            @endforeach
        </div>
    </body>
</html>