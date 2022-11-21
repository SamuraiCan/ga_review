@extends('layouts/layout')

@section('content')

@if (session('status'))
  <div class="alert alert-primary text-center">
    {{ session('status') }}
  </div>
@endif

<div class="d-flex justify-content-between align-items-center">
  <h1 class="text-primary">{{ $game->title }}</h1>
  <a class="btn btn-warning" href="{{ route('review.create', ['game_id' => $game->id]) }}">口コミ投稿する</a>
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
        <div class="col-5">
          <div class="card h-100">
            <div class="card-body">
              @if ($chart)
                <x-rader :data="$chart" />
              @else
                <h5 class="text-danger">レビューデータがありません</h5>
              @endif
              <h5 class="card-title">ゲームタイトル: {{ $game->title }}</h5>
              <p class="card-date">リリース日 {{ $game->release_date }}</p>
              <div>
                <div class="starsScore" style="--rating: {{ $score }};" aria-label="Rating"></div>
                <div>{{ $score }}</div>
              </div>
            </div>
            <div class="card-footer">
              <a class="btn btn-secondary" href="{{ route('game.edit', $game->id) }}">編集</a>
            </div>
          </div>
        </div>
        <div class="col-7">
          <div class="card">
            <div class="card-header">デバイス</div>
            <div class="card-body">
              @foreach ($devices as $device)
                <div>{{ $device->name }}</div>
              @endforeach
            </div>
          </div>
          <div class="card mt-4">
            <div class="card-header">ジャンル</div>
            <div class="card-body">
              @foreach ($genres as $genre)
                <div>{{ $genre->name }}</div>
              @endforeach
            </div>
          </div>
          <div class="card mt-4">
            <div class="card-header">レビュー</div>
            <div class="card-body">
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
                      <div>review: {!! nl2br($review->review) !!}</div>
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
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="voice" class="tab-pane pt-3">
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
              <div class="col-6">
                <div class="starsScore" style="--rating: {{ $review->score }};" aria-label="Rating"></div>
                <div>review: {!! nl2br($review->review) !!}</div>
              </div>
              <div class="col-6">
                <x-rader :data="$review" />
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