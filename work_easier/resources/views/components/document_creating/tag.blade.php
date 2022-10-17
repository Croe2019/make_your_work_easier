<label for="basic-url" class="form-label">タグ名 最大4つまで</label>
<!--親要素-->
<div class="input-form" id="input-form">
  <!--テンプレート作成-->
  <template id="form-template">
    <div class="tag" id="tag">
      <!--name属性にはフォーム追加時にインデント番号を付与-->
      <input type="text" size="20" name="tags" placeholder="#タグ名">
    </div>
  </template>
</div>
@error('tags1')
<p style="color: red;">{{ $message }}</p>
@enderror
<!--ボタンをクリックしたらJavascriptファイル内の関数addForm()を実行する-->
<div class="bt_addForm">
  <input type="button" class="btn btn-primary" value="追加" onclick="addForm()">
</div>
<!--「削除」ボタンをクリックしたらJavascriptファイル内の関数deleteForm()を実行する-->
<div class="bt_deleteForm">
  <input type="button" class="btn btn-danger" value="削除" onclick="deleteForm()">
</div>  

<script>
  //ページ読み込み時に関数addForm()を実行
  window.addEventListener('DOMContentLoaded', addForm);
  //インデント番号を初期化
  let i = 1
  function addForm() 
  {
      // 4以上なら処理を終了する
      if (i > 4) {
          return;
      } else {
        // HTMLからtemplate要素を取得
        const template = document.getElementById("form-template");
        // templateの内容を複製
        const new_form = template.content.cloneNode(true);

        // 子要素を指定しname属性の値を変更
        const new_form_name = new_form.children[0].children[0];
        new_form_name.name = 'tags'+i;
        //親要素を取得し 複製した要素を追加
        const parent = document.getElementById("input-form");
        parent.appendChild(new_form);
        //インデント番号を更新
        i++;
      }
  }

  function deleteForm() 
  {
    const form_length = document.querySelectorAll('div.tag').length;
    // フォームの数が1個なら処理を終了
    if(form_length === 1){
      return;
    }else{
      const delete_form = document.getElementById('input-form').lastElementChild;
      delete_form.remove();
      // インテント番号を更新
      i--;
    }
    
}
</script>

<style>
  input {
  display: block;
  margin-top: 10px;
}
</style>