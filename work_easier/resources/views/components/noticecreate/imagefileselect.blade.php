<div class="mb-3">
  <label for="formFileMultiple" class="form-label">画像を選択</label>
  <input class="form-control" type="file" id="formFileMultiple" name="images[]" accept='image/*' multiple="multiple" onchange="loadImage(this);">
  <p id="preview"></p>
  <style>
    #preview img {
      width:100px;
      border:1px solid #cccccc;
    }
  </style>
</div>
<script>
function loadImage(obj)
  {
    document.getElementById('preview').innerHTML = '<p>プレビュー</p>';
    for (i = 0; i < obj.files.length; i++) {
      var fileReader = new FileReader();
      fileReader.onload = (function (e) {
        document.getElementById('preview').innerHTML += '<img src="' + e.target.result + '">';
      });
      fileReader.readAsDataURL(obj.files[i]);
    }
  }
</script>