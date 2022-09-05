<!DOCTYPE html>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Sample Select Image</title>
    </head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <body>
        <div class="mb-3">
            <form method="POST" action="{{ route('SampleImage.upload') }}" enctype="multipart/form-data">
                @csrf
                <label for="formFileMultiple" class="form-label">画像を選択</label>
                <input class="form-control" type="file" id="formFileMultiple" name="file[]" multiple>
                <button type="submit">アップロード</button>
            </form>
        </div>
        @foreach($images as $image)
            {{ $image }}
        @endforeach
    </body>
</html>