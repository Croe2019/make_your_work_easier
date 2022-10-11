<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <x-sharing.bootstrap></x-sharing.bootstrap>
        <title>Notice</title>
    </head>
    <body>
    <x-sharing.menu></x-sharing.menu>
        <!-- ここにお知らせ一覧を表示させる -->
        <hr>
        <div class="mt-5">
            @foreach($notices as $notice)
                <details>
                    <summary>
                        <img id="preview" src="{{ Storage::url($notice->user->user_image) }}" style="max-width:200px;"> {{ $notice->content }} by {{ $notice->user->name }}
                    </summary>
                    <x-chat.images :images="$notice->images"></x-chat.images>
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