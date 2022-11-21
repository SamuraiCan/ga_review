@extends('layouts/layout')

@section('content')

	<x-heading.h1
	  title="口コミ新規投稿"
	/>

	<form action="{{ route('review.store') }}" method="POST">
		@csrf

		<div class="card mb-4">
			<div class="card-header">ゲームタイトル</div>
			<div class="card-body">
				<h2>{{ $game->title }}</h2>
				<input type="hidden" name="game" value="{{ $game->id }}">
				@error('game')
					{{ $message }}
				@enderror
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-header">評価</div>
			<div class="card-body">
				@php
					$items = [
						'graphic' => 'グラフィック',
						'volume' => 'ボリューム',
						'sound' => 'サウンド',
						'story' => 'ストーリー',
						'comfort' => '快適さ'
					];
					$score = 10;
					$evalution = 5;
				@endphp
				@foreach ($items as $k => $v)
					<div class="wrapAssessment">
						<h2>{{ $v }}</h2>
						@for ($i = 1; $i <= $score; $i++)
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="{{ $k }}" id="{{ $k }}{{ $i }}" value="{{ $i }}">
							<label class="form-check-label" for="{{ $k }}{{ $i }}">{{ $i }}</label>
						</div>
						@endfor
						@error('graphic')
						{{ $message }}
						@enderror
					</div>
				@endforeach
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">総合評価</div>
			<div class="card-body">
				<div class="score">
					<div class="stars">
						<span>
							@for ($i = $score; $i > 0; $i--)
								<input id="score{{ $i }}" type="radio" name="score" value="{{ $i }}">
								<label for="score{{ $i }}">★</label>
							@endfor
						</span>
					</div>
				</div>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">プレイ機器</div>
			<div class="card-body">
				@foreach ($device_all as $device)
					<div class="form-check">
						<input
							class="form-check-input"
							name="devices[]"
							type="checkbox"
							value="{{ $device->id }}"
							id="device_{{ $device->id }}"
						>
						<label class="form-check-label" for="device_{{ $device->id }}">
							{{ $device->name }}
						</label>
					</div>
				@endforeach
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">プレイした時間</div>
			<div class="card-body">
				@foreach ($playtimes as $playtime)
					<div class="form-check form-check-inline">
						<input
							class="form-check-input"
							type="radio"
							name="playtime"
							id="playtime_{{ $playtime['id'] }}"
							value="{{ $playtime['id'] }}"
						>
						<label class="form-check-label" for="playtime_{{ $playtime['id'] }}">{{ $playtime['name'] }}</label>
					</div>
				@endforeach
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">レビュー</div>
			<div class="card-body">
				<textarea name="review" rows="20" class="form-control">{{old('review')}}</textarea>
			</div>
		</div>
	
		<div class="text-center">
			<button type="submit" class="btn btn-primary">送信</button>
		</div>
	</form>

@endsection