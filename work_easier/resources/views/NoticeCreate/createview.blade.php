<!DOCTYPE html>
<html lang="ja">
    <head>
        <x-noticecreate.share></x-noticecreate.share>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>お知らせを作成</h1>
        @auth
            <!-- ここに入力フォームを表示させる -->
            <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-noticecreate.textarea></x-noticecreate.textarea>
                <x-noticecreate.imagefileselect></x-noticecreate.imagefileselect>
                <x-noticecreate.sendbutton></x-noticecreate.sendbutton>
            </form>
        @endauth
    </body>
</html>