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
                <details>
                    <summary>{{ $notice->content }}</summary>
                    <p><img src="{{ Storage::url($notice->image_path) }}" width="25%"></p>
                    <div>
                        <a href="{{ route('NoticeUpdate.update', ['notice_id' => $notice->id]) }}">編集</a>
                        <form action="{{ route('Notice.delete', ['notice_id' => $notice->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">削除</button>
                        </form>
                    </div>
                    <hr>
                </details>
            @endforeach
        </div>
    </body>
</html>