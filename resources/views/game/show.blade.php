@extends('layouts/layout')

@section('content')

@if (session('status'))
  <div class="alert alert-primary text-center">
    {{ session('status') }}
  </div>
@endif

<x-heading.h1
  title="{{ $game->title }}"
/>

<div class="d-flex justify-content-between mb-4">
  <div class="d-flex">
    <div class="btn btn-info me-2">
      みんなからのいいね数：
      <span id="like_total">{{ count($likes) }}</span>
    </div>
    @if (Auth::check())
      <div class="d-flex justify-content-end btn btn-primary">
        <label class="form-check-label me-2 fw-bold text-white" for="like_switch">
          あなたのいいね
        </label>
        <div class="form-check form-switch">
          <input
            class="form-check-input"
            type="checkbox"
            id="like_switch"
            @if ($game->is_like()) checked @endif
          >
        </div>
      </div>
      <script>
        const like_switch = document.getElementById('like_switch');
        const like_total = document.getElementById('like_total');
        like_switch.addEventListener('click', (e) => {
          const postData = new FormData;
          postData.set('game', {{ $game->id }});
          postData.set('like', e.target.checked);
          console.log(e.target.checked);
          fetch('{{ route("game.like_change") }}', {
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
              'Accept': 'application/json'
            },
            body: postData
          })
          .then(res => res.json())
          .then(data => { like_total.innerHTML = data.like_total; })
          .catch(error => { console.log(error); });
        });
      </script>
    @endif
  </div>
  @if(Auth::check())
  <a
    class="btn btn-warning"
    href="{{ route('review.create', ['game_id' => $game->id]) }}"
  >
    口コミ投稿する
  </a>
  @else
    <button
      class="btn btn-secondary"
      onclick="must_login()"
    >
      口コミ投稿する
    </button>
    <script>
      function must_login(){
        alert('ログインすると投稿できます');
      }
    </script>
  @endif
</div>

<div class="container">

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="#info">商品情報</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#voice">口コミ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#image">投稿写真・動画</a>
    </li>
  </ul>

  <div class="tab-content">

    <div id="info" class="tab-pane pt-3 active">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card h-100">
            <div class="card-body d-flex">
              <div class="eyecatch">
                @if (count($images) > 0)
                  <img src="{{ Storage::url($images[0]->image_path) }}">
                @else
                  <img src="http://placehold.jp/200x250.png" alt="">
                @endif
              </div>
              <div class="ms-3">
                @foreach ($devices as $device)
                  <span>＜{{ $device->name }}＞</span>
                @endforeach
                <div>{{ $game->description }}</div>
                <ul>
                  <li>リリース日：{{ $game->release_date }}</li>
                  <li>ジャンル：
                    @foreach ($genres as $genre)
                      <span class="me-2">{{ $genre->name }}</span>
                    @endforeach
                  </li>
                  <li>プレイ人数：{{ $game->players }}人</li>
                  <li>オフィシャルURL：<a href="{{ $game->offical_url }}">{{ $game->offical_url }}</a></li>
                  <li>発売元：{{ $game->agency }}</li>
                </ul>
              </div>
            </div>
            <div class="card-footer">
              <a class="btn btn-secondary" href="{{ route('game.edit', $game->id) }}">編集</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="voice" class="tab-pane pt-3">
      <div class="card mb-2">
        <div class="card-header">
          プレイ評価
        </div>
        <div class="card-body">
          <div class="d-flex align-items-center mb-4">
            <strong class="me-3">口コミ評価</strong>
            <span class="starsScore" style="--rating: {{ $score }};" aria-label="Rating"></span>
            <strong class="ms-3">{{ $score }}</strong>
          </div>
          <div class="d-flex">
            <div class="w-100 h-100">
              @if ($chart)
                <x-chart.rader_game :data="$chart" />
              @else
                <h5 class="text-danger">レビューデータがありません</h5>
              @endif
            </div>
            <div class="w-100 h-100">
              @if ($chart_sex)
                <x-chart.doughnut_sex :data="$chart_sex" />
              @else
                <h5 class="text-danger">レビューデータがありません</h5>
              @endif
            </div>
            <div class="w-100 h-100">
              @if ($chart_device)
                <x-chart.polarArea_device :data="$chart_device" />
              @else
                <h5 class="text-danger">レビューデータがありません</h5>
              @endif
            </div>
          </div>
        </div>
      </div>
      @foreach ($reviews as $k => $review)
      @if ($k == $reviews->keys()->last())
      <div class="card">
      @else
      <div class="card mb-2">
      @endif
        <div class="card-header">
          {{ $review->user->name }}
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <div class="starsScore" style="--rating: {{ $review->score }};" aria-label="Rating"></div>
              <div>review: {!! nl2br($review->review) !!}</div>
            </div>
            <div class="col">
              <div>score: {{ $review->score }}</div>
              <div>graphic: {{ $review->graphic }}</div>
              <div>volume: {{ $review->volume }}</div>
              <div>sound: {{ $review->sound }}</div>
              <div>story: {{ $review->story }}</div>
              <div>comfort: {{ $review->comfort }}</div>
              @if (count($review->device) > 0)
                <h6 class="mt-4">使用デバイス</h6>
                @foreach ($review->device as $device)
                  <div>{{ $device->name }}</div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div id="image" class="tab-pane">
      <h2>Image</h2>
      @if ($images)
        <div>
          @foreach ($images as $image)
            <img src="{{ Storage::url($image->image_path) }}" width="100">
          @endforeach
        </div>
      @endif
    </div>
  </div>

</div>

@endsection