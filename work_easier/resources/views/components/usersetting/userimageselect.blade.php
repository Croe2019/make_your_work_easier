<div class="mb-3">
<p>
<img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
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
</div>