<div class="mb-3">
  <label for="formFile" class="form-label">ファイルを選択してください</label>
  <input class="form-control" type="file" name="images" id="formFile">
</div>

@error('images')
<p style="color: red;">{{ $message }}</p>
@enderror

<!-- <style>
    .mt-n1 {
    margin-top: 5.0rem !important;
    }
</style> -->