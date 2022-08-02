<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">EntranceMenu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            @if (Route::has('login'))
                <div>
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link active">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link active">ログイン</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">   
                                <a href="{{ route('register') }}" class="nav-link active">新規登録</a>
                            </li>
                        @endif
                    @endauth
                </div>
            @endif
        </li>
      </ul>
    </div>
  </div>
</nav>