@extends('layouts/layout')

@section('content')


<x-heading.h1
  title="ゲームタイトル一覧"
  subTitle="Game List"
/>

<div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($games as $game)
      <div class="col">
        <div class="card h-100">
          <div class="card-body">
            <a href="{{ route('game.show', $game->id) }}">
              <h5 class="card-title">ゲームタイトル: {{ $game->title }}</h5>
            </a>
            <p class="card-date">リリース日 {{ $game->release_date }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection