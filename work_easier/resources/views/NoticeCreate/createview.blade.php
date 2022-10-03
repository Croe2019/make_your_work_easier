<!DOCTYPE html>
<html lang="ja">
    <head>
        <x-sharing.bootstrap></x-sharing.bootstrap>
        <meta charset="utf-8">
    </head>
    <body>
        <!-- <x-sharing.menu></x-sharing.menu> -->
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