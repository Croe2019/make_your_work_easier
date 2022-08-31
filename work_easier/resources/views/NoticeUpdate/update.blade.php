<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Notice Edit</title>
        <x-notice-update.share></x-notice-update.share>
    </head>
    <body>
        <x-notice-update.menu></x-notice-update.menu>
        <h1>お知らせを編集する</h1>
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
                    @error('content')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror

                    <p>
                    <img id="preview" src="{{ Storage::url($notice->image_path) }}" style="max-width:200px;">
                    </p>
                    <label for="formFileMultiple" class="form-label">プロフィール画像を選択</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="image_path" multiple accept='image/*' onchange="previewImage(this);">
                    <script>
                        function previewImage(obj)
                        {
                            var fileReader = new FileReader();
                            fileReader.onload = (function() {
                                document.getElementById('preview').src = fileReader.result;
                            });
                            fileReader.readAsDataURL(obj.files[0]);
                        }
                    </script>
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </form>
        @endauth
    </body>
</html>