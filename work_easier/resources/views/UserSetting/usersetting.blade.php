<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <x-usersetting.share></x-usersetting.share>
        <title>UserSetting</title>
    </head>
    <body>
        <h1>UserSetting Page</h1>
        {{ $user_id }}
        @auth
            <form action="{{ route('userstatus.store', '$user_id') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-usersetting.userimageselect></x-usersetting.userimageselect>
                <x-usersetting.username></x-usersetting.username>
                <x-usersetting.userstatus></x-usersetting.userstatus>
                <x-usersetting.sendbutton></x-usersetting.sendbutton>
            </form>
        @endauth
    </body>
</html>