<!DOCTYPE html>
<html lang="ja">
    <head>
        <x-sharing.bootstrap></x-sharing.bootstrap>
        <meta charset="utf-8">
    </head>
    <body>
        <div class="container">
            <div class="menu">
                <x-sharing.menu></x-sharing.menu>
            </div>
            @auth
                <!-- ここに入力フォームを表示させる -->
                <div class="form">
                    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-noticecreate.textarea></x-noticecreate.textarea>
                        <x-noticecreate.imagefileselect></x-noticecreate.imagefileselect>
                        <x-noticecreate.sendbutton></x-noticecreate.sendbutton>
                    </form>
                </div>
            @endauth
        </div>
    </body>
</html>

<style>
    .form{
        padding-top: 90px;
    }
</style>