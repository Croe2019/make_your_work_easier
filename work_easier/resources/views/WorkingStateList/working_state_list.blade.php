<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <x-sharing.bootstrap></x-sharing.bootstrap>
        <title>WorkingStateList</title>
        <link rel="stylesheet" href="{{ asset('/assets/css/image_size.css') }}">
    </head>
    <body>
        <x-sharing.menu></x-sharing.menu>
        <div class="mt-5">
            <table class="table table-hover">
                <thead class="table">
                    <tr>
                    <th scope="col" class="text-center">ユーザー画像</th>
                    <th scope="col" class="text-center">名前</th>
                    <th scope="col" class="text-center">勤務状態</th>
                    <th scope="col" class="text-center">ユーザー設定</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            @if($user->user_image != null)
                                <td class="text-center"><img id="preview" src="{{ Storage::url($user->user_image) }}" style="max-width:200px;"></td>
                            @else
                            <td class="text-center"><p>No Image</p></td>
                            @endif
                            <td class="text-center">{{ $user->name }}</a></td>
                            @if($user->user_status == 1)
                                <td class="text-center">出勤</a></td>
                            @elseif($user->user_status == 2)
                                <td class="text-center">退勤</a></td>
                            @elseif($user->user_status == 3)
                                <td class="text-center">休憩</a></td>
                            @elseif($user->user_status == 4)
                                <td class="text-center">休日</a></td>
                            @endif
                            @if($user->id == $user_id)
                                <td class="text-center"><a class="nav-link" href="{{ route('UserSettingEdit.edit', '$user_id') }}">マイページ</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </body>
</html>