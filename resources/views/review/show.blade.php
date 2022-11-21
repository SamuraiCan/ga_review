@extends('layouts/layout')

@section('content')

<div class="container">

  <div class="d-flex justify-content-end">
    <label class="form-check-label me-2 fw-bold" for="approval_switch">承認</label>
    <div class="form-check form-switch">
      <input
        class="form-check-input"
        type="checkbox"
        id="approval_switch"
        @if ($review->is_approval) checked @endif
      >
    </div>
  </div>

  <script>
    const approval_switch = document.getElementById('approval_switch');
    approval_switch.addEventListener('click', (e) => {
      const postData = new FormData;
      postData.set('review', {{ $review->id }});
      postData.set('approval', e.target.checked);
      fetch('{{ route("review.approval_change") }}', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
          'Accept': 'application/json'
        },
        body: postData
      })
      .then(res => res.json())
      .then(data => { console.log(data); })
      .catch(error => { console.log(error); });
    });
  </script>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="#info">商品情報</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#voice">評価</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#image">投稿写真・動画</a>
    </li>
  </ul>

  <div class="tab-content">

    <div id="info" class="tab-pane active">
      <h5 class="card-title mt-2">ゲームタイトル: {{ $game->title }}</h5>
      <ul>
        <li>説明：{{ $game->description }}</li>
        <li>プレイ人数：{{ $game->players}}</li>
        <li>オフィシャルURL：
          <a href="{{ $game->offical_url }}" target="_blank" rel="noopener">
            {{ $game->offical_url }}
          </a>
        </li>
        <li>運営：{{ $game->agency }}</li>
        <li>リリース日：{{ $game->release_date }}</li>
      </ul>
    </div>

    <div id="voice" class="tab-pane">
      <div class="row pt-2">
        <div class="col-8">
          <div class="card h-100">
            <div class="card-body">
              <x-rader :data="$review" />
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card h-100">
            <div class="card-body">
              <div>投稿者：{{ $review->user->name }}</div>
              <div class="starsScore" style="--rating: {{ $review->score }};" aria-label="Rating"></div>
              <div>{{ $review->review }}</div>
              <div>{{ $review->created_at }}</div>
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
    </div>

    <div id="image" class="tab-pane">
      <h2>Image</h2>
    </div>
  </div>


</div>

@endsection