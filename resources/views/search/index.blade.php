@extends('layouts/layout')

@section('content')

<x-heading.h1
  title="検索結果"
  subTitle="Search Results"
/>

<div class="row row-cols-1 g-5">
  <div class="col">
    @foreach($games as $game)
      <div class="card mb-4">
        <h5 class="card-header">
          <a href="{{ route('game.show', $game->id) }}">
            {{ $game->title }}
          </a>
        </h5>
        <div class="card-body d-flex">
          <div class="eyecatch">
            @if (count($game->image) > 0)
              <img src="{{ Storage::url($game->image->first()->image_path) }}" alt="">
            @else
              <img src="http://placehold.jp/200x250.png" alt="">
            @endif
          </div>
          <div class="card-text">
            <dl>
              <dd>
                <div class="starsScore" style="--rating: {{ Helper::get_score($game) }};" aria-label="Rating"></div>
              </dd>
              <dd>description: {{ $game->description }}</dd>
              <dd>リリース日: {{ $game->release_date }}</dd>
              <dd>
                @if (count($game->devices) > 0)
                  デバイス: 
                  @foreach ($game->devices as $k => $device)
                    <span>{{ $device->name }}</span>
                    @if ($k != $game->devices->keys()->last())
                      <span> / </span>
                    @endif
                  @endforeach
                @endif
              </dd>
              <dd>
                @if (count($game->genres) > 0)
                  ジャンル: 
                  @foreach ($game->genres as $k => $genre)
                    <span>{{ $genre->name }}</span>
                    @if ($k != $game->genres->keys()->last())
                      <span> / </span>
                    @endif
                  @endforeach
                @endif
              </dd>
            </dl>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<div class="text-center">
  {{ $games->appends( request()->input() )->links() }}
</div>

@endsection