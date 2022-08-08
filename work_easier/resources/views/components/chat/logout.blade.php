<div>
  <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a class="nav-link" href="route('logout')"
              onclick="event.preventDefault();
                          this.closest('form').submit();">
          ログアウト
      </a>
  </form>
</div>