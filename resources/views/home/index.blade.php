@extends('layouts/layout')

@section('content')

<div class="mb-5">
  <x-heading.h1
    title="新着タイトル"
    subTitle="New Title"
  />
  @foreach ($games_new as $k => $v)
    @if ($k == $games_new->keys()->last())
      <div class="card">
    @else
      <div class="card mb-2">
    @endif
      <h5 class="card-header">{{ $v->title }}</h5>
      <div class="card-body d-flex">
        <div class="eyecatch">
          <img src="http://placehold.jp/200x250.png" alt="">
        </div>
        <div class="card-text">
          <div>説明：{{ $v->description }}</div>
          <div>リリース日：{{ $v->release_date }}</div>
          <div>プレイ人数：{{ $v->players }}</div>
          <div>オフィシャルURL：{{ $v->offical_url }}</div>
          <div>運営：{{ $v->agency }}</div>
          @if (count($v->devices) > 0)
            <div>使用デバイス：
              @foreach ($v->devices as $k2 => $device)
                <span>{{ $device->name }}</span>
                @if ($k2 != $v->devices->keys()->last())
                  <span> / </span>
                @endif
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
  @endforeach
</div>

<div class="mb-5">
  <x-heading.h1
    title="注目タイトル"
    subTitle="Attention Title"
  />
  @foreach ($games_attention as $k => $v)
    @if ($k == $games_attention->keys()->last())
      <div class="card">
    @else
      <div class="card mb-2">
    @endif
        <h5 class="card-header">{{ $v->title }}</h5>
        <div class="card-body d-flex">
          <div class="eyecatch">
            <img src="http://placehold.jp/200x250.png" alt="">
          </div>
          <div class="card-text">
            <div>説明：{{ $v->description }}</div>
            <div>リリース日：{{ $v->release_date }}</div>
            <div>プレイ人数：{{ $v->players }}</div>
            <div>オフィシャルURL：{{ $v->offical_url }}</div>
            <div>運営：{{ $v->agency }}</div>
            @if (count($v->devices) > 0)
              <div>使用デバイス：
                @foreach ($v->devices as $k2 => $device)
                  <span>{{ $device->name }}</span>
                  @if ($k2 != $v->devices->keys()->last())
                    <span> / </span>
                  @endif
                @endforeach
              </div>
            @endif
          </div>
        </div>
      </div>
  @endforeach
</div>

<div>
  <x-heading.h1
    title="おすすめタイトル"
    subTitle="Recommend Title"
  />
  
  @foreach ($games_recommend as $k => $v)
    @if ($k == $games_recommend->keys()->last())
      <div class="card">
    @else
      <div class="card mb-2">
    @endif
      <h5 class="card-header">{{ $v->title }}</h5>
      <div class="card-body d-flex">
        <div class="eyecatch">
          <img src="http://placehold.jp/200x250.png" alt="">
        </div>
        <div class="card-text">
          <div>説明：{{ $v->description }}</div>
          <div>リリース日：{{ $v->release_date }}</div>
          <div>プレイ人数：{{ $v->players }}</div>
          <div>オフィシャルURL：{{ $v->offical_url }}</div>
          <div>運営：{{ $v->agency }}</div>
          @if (count($v->devices) > 0)
            <div>使用デバイス：
              @foreach ($v->devices as $k2 => $device)
                <span>{{ $device->name }}</span>
                @if ($k2 != $v->devices->keys()->last())
                  <span> / </span>
                @endif
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection