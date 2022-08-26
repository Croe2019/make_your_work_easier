<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <x-usersettingedit.share></x-usersettingedit.share>
    </head>
    <body>
        <h1>ユーザー設定編集</h1>
        @auth
            <form action="{{ route('update', $user_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <p>
                    <img id="preview" src="{{ Storage::url($user->user_profile_image) }}" style="max-width:200px;">
                    </p>
                    <label for="formFileMultiple" class="form-label">プロフィール画像を選択</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="user_profile_image" multiple accept='image/*' onchange="previewImage(this);">
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
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="user_name" value="{{ $user->user_name }}">
                    <!-- 勤務状態の変更をするドロップダウン -->
                    <select class="form-select" aria-label="Default select example" name="user_status">
                        <option selected>{{ $user->user_status }}</option>
                        <option value="1">出勤</option>
                        <option value="2">退勤</option>
                        <option value="3">休憩</option>
                        <option value="4">休日</option>
                    </select>
                    <x-usersettingedit.sendbutton></x-usersettingedit.sendbutton>
                </div>
            </form>
        @endauth
    </body>
</html>