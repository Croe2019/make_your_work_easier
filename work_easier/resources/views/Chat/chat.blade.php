<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <x-sharing.bootstrap></x-sharing.bootstrap>
        <title>Notice</title>
        <link rel="stylesheet" href="{{ asset('/assets/css/notice_list.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
    </head>
    <body>
        <x-sharing.menu></x-sharing.menu>
        <!-- ここにお知らせ一覧を表示させる -->
        <div id="notice" class="mt-5">
            @foreach($notices as $notice)
                <div class="user_data_flex">
                    <figure class="profile_image">
                        <img class="profile_image" id="preview" src="{{ Storage::url($notice->user->user_image) }}">
                    </figure>
                    <p class="user_data">{{ $notice->user->name }} {{ $notice->created_at->format('m/d H:i') }}</p>

                    <div class="options">
                        @if($user_id == $notice->user_id)
                            <div id="container">
                                <ul id="menu">
                                    <li><a href="#">Edit / Delete</a>
                                        <ul>
                                            <!-- 編集ボタン -->
                                            <div class="option-button">
                                                <li id="update">
                                                    <a href="{{ route('NoticeUpdate.update', ['notice_id' => $notice->id]) }}">
                                                        <x-sharing.edit_button></x-sharing.edit_button>
                                                    </a>
                                                </li>
                                                <!-- 削除ボタン -->
                                                <form action="{{ route('Notice.delete', ['notice_id' => $notice->id]) }}" method="POST" onclick="return confirm('削除してもよろしいですか？')">
                                                    @method('DELETE')
                                                    @csrf
                                                    <li id="delete">
                                                        <x-sharing.delete_button></x-sharing.delete_button>
                                                    </li>
                                                </form>
                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <p class="content">{{ $notice->content }}</p>
                <x-chat.images :images="$notice->images"></x-chat.images>
                <hr>
            @endforeach
        </div>
    </body>
</html>