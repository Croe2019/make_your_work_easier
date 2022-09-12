<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Notice Edit</title>
        <x-notice-update.share></x-notice-update.share>
    </head>
    <body>
        <x-notice-update.menu></x-notice-update.menu>
        <a href="{{ route('Chat.chat') }}">戻る</a>
        <p>投稿フォーム</p>
        @if(session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
        @auth
            <form action="{{ route('Notice.Update', ['notice_id' => $notice->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">お知らせ作成欄</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3" placeholder="ここに入力">{{ $notice->content }}</textarea>
                    <x-notice-update.image :images="$notice->images"></x-notice-update.image>
                    <x-notice-update.imagefileselect></x-notice-update.imagefileselect>
                    @error('content')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </form>
        @endauth
    </body>
</html>