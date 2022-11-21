@extends('layouts/layout')

@section('content')

<x-heading.h1
  title="未承認レビュー"
  subTitle="UnApproval Review"
/>

<div class="container">
  <div class="row row-cols-2 row-cols-md-4 g-4">
    @foreach ($reviews as $review)
      <div class="col">
        <div class="card h-100">
          <x-rader :data="$review" />
          <div class="card-body">
            <h5 class="card-title">投稿者: {{ $review->user->nickname }}</h5>
            <ul>
              <li>ゲームタイトル：{{ $review->game->title }}</li>
              <li>レビュー: {{ $review->review }}</li>
            </ul>
          </div>
          <div class="card-footer">
            <a href="{{ route('review.show', $review->id) }}" class="btn btn-secondary">詳細</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection