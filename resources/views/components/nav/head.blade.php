<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container-fluid p-0">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('img/logo_256x152.png') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">
            <i class="bi bi-award-fill"></i>TOP
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('game.index') }}">
            <i class="bi bi-bricks"></i>タイトル
          </a>
        </li>
        @if(!Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">
              <i class="bi bi-receipt"></i>新規会員登録
            </a>
          </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ route('mypage') }}">
            <i class="bi bi-tag"></i>マイページ
          </a>
        </li>
        @can('admin')
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownGame" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-controller"></i>管理ページ
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownGame">
              <li><a class="dropdown-item" href="{{ route('admin') }}">TOP</a></li>
              <li><a class="dropdown-item" href="{{ route('game.create') }}">タイトル登録</a></li>
              <li><a class="dropdown-item" href="{{ route('review.index') }}">承認レビュー</a></li>
              <li><a class="dropdown-item" href="{{ route('review.unapproved') }}">未承認レビュー</a></li>
            </ul>
          </li>
        @endcan
      </ul>
      <form method="GET" action="#" class="d-flex">
        <input
          class="form-control me-2"
          type="search"
          placeholder="Search"
          name="search"
          value="@if (isset($search)) {{ $search }} @endif"
          aria-label="Search"
        >
        <button class="btn btn-outline-primary text-nowrap" type="submit">タイトル検索</button>
      </form>
  </div>
  </div>
</nav>

@if (session('success'))
  <div class="alert alert-success text-center">
    {{ session('success') }}
  </div>
@endif
@if ($errors->any())
  <div class="alert alert-danger" {{ $attributes }}>
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif