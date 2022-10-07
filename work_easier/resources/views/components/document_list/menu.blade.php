<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Darkオフキャンバス・ナビバー</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Darkオフキャンバス</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="閉じる"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('Chat.chat') }}">ホーム</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('NoticeCreate.createview') }}">お知らせ投稿</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('MyPage.mypage', '$user_id') }}">マイページ</a>
          </li>
          <li class="nav-item">
            <x-chat.logout></x-chat.logout>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Document
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="{{ route('DocumentCreating.document_creating') }}">資料保存</a></li>
              <li><a class="dropdown-item" href="{{ route('DocumentList.document_list') }}">資料一覧</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
            </ul>
          </li>
        </ul>
        <form action="{{ route('DocumentSearch.document_search_result') }}" method="get" class="d-flex" role="search">
          <input class="form-control me-2" type="search" name="keyword" placeholder="資料を検索" aria-label="検索">
          <button class="btn btn-success flex-shrink-0" type="submit">検索</button>
        </form>
      </div>
    </div>
  </div>
</nav>