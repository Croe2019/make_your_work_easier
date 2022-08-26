<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>User My Page</title>
        <x-usersetting.share></x-usersetting.share>
    </head>
    <body>
        <x-usersetting.menu></x-usersetting.menu>
        <h1>User My Page</h1>
        {{ $user_id }}
        <a class="nav-link" href="{{ route('UserSetting.usersetting', '$user_id') }}">ユーザー設定</a>
        <a class="nav-link" href="{{ route('UserSettingEdit.edit', '$user_id') }}">ユーザー設定編集</a>
    </body>
</html>