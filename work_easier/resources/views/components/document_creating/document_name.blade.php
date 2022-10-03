<div class="mt-n1">
  <label for="exampleFormControlInput1" class="form-label">資料名</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="document_name" placeholder="例：Laravel入門1">
</div>

@error('document_name')
<p style="color: red;">{{ $message }}</p>
@enderror

<style>
    .mt-n1 {
    margin-top: 4.0rem !important;
    }
</style>