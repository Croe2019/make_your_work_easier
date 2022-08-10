<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">お知らせ作成欄</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3" placeholder="ここに入力"></textarea>
  @error('content')
  <p style="color: red;">{{ $message }}</p>
  @enderror
</div>