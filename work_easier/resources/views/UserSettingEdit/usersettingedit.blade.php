<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <x-sharing.bootstrap></x-sharing.bootstrap>
        <link rel="stylesheet" href="{{ asset('/assets/css/user_setting.css') }}">
    </head>
    <body>
        <x-sharing.menu></x-sharing.menu>
        @auth
            <form action="{{ route('update', $user_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="user_setting_form" class="mt-5">
                    @if($user->user_image == null)
                        <p>No Image</p>
                    @else
                        <div class="profile_data_flex">
                            <div id="profile_image">
                                <h1><img id="preview" src="{{ Storage::url($user->user_image) }}" style="max-width:200px;">{{ $user->name }} アカウント / プロフィール設定</h1>
                            </div>
                        </div>
                    @endif
                    <label for="formFileMultiple" class="form-label">プロフィール画像を選択</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="user_image" multiple accept='user_image/*' onchange="previewImage(this);">
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
                    <!-- ユーザー名を編集するフォーム -->
                    <label for="formFileMultiple" class="form-label">ユーザー名</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{ $user->name }}">
                    <!-- 勤務状態の変更をするドロップダウン -->
                    <div id="user_status">
                        <label for="formFileMultiple" class="form-label">勤務状態</label>
                        <select class="form-select" aria-label="Default select example" name="user_status">
                            <option value="1">出勤</option>
                            <option value="2">退勤</option>
                            <option value="3">休憩</option>
                            <option value="4">休日</option>
                        </select>
                    </div>
                    <div id="save">
                        <x-usersettingedit.sendbutton></x-usersettingedit.sendbutton>
                    </div>
                </div>
            </form>
            @if(session('feedback.success'))
                 <p style="color: green">{{ session('feedback.success') }}</p>
            @endif
        @endauth
    </body>
</html>