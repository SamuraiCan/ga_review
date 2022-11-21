@if ( Auth::check() )
  <div class="h5 mb-4 text-center">
    こんにちは、{{ Auth::user()->name }}さん
  </div>
  <div class="menu-sidebar">
    <ul>
      <li>
        <a href="{{ route('mypage') }}" class="btn">
          マイページ
        </a>
      </li>
      <li>
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="btn">ログアウト</button>
        </form>
      </li>
    </ul>
  </div>
@else
  <div class="card">
    <div class="card-header">
      ログイン
    </div>
    <div class="card-body">
      <ul class="list-group">
        <li class="list-group-item">
          <a href="{{ route('login') }}" class="btn">ログイン</a>
        </li>
        <li class="list-group-item">
          <a href="{{ route('register') }}" class="btn">クチコミメンバー新規登録</a>
        </li>
      </ul>
    </div>
  </div>
@endif