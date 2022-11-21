@extends('layouts/layout')

@section('content')

@if ($errors->any())
	<div class="has-background-danger">
		<p>
			<span class="has-text-weight-bold">エラー！</span> 入力内容に問題がありました。
		</p>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<div class="d-flex justify-content-between align-items-center">
	<h1>タイトル編集</h1>
	<h2>「{{ $game->title }}」</h2>
</div>

<form action="{{ route('game.update', $game->id) }}" method="POST" enctype="multipart/form-data">
	@method('PUT')
	@csrf

		<div class="card mb-4">
			<div class="card-header">タイトル</div>
			<div class="card-body">
				<input
					type="text"
					name="title"
					class="form-control"
					value="{{ $game->title }}"
				>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">内容説明</div>
			<div class="card-body">
				<textarea
					name="description"
					rows="10"
					class="form-control">{{ $game->description }}</textarea>
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
							id="defaultCheck{{ $device->id }}"
							{{ $devices->contains($device) ? 'checked' : '' }}
						>
						<label class="form-check-label" for="defaultCheck{{ $device->id }}">
							{{ $device->name }}
						</label>
					</div>
				@endforeach
			</div>
		</div>
		
		<div class="card mb-4">
			<div class="card-header">発売日</div>
			<div class="card-body">
				<input
					id="release_date"
					class="form-control"
					type="date"
					name="release_date"
					value="{{ $game->release_date }}"
				>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">ジャンル</div>
			<div class="card-body">
				@foreach ($genre_all as $genre)
					<div class="form-check">
						<input
							class="form-check-input"
							name="genres[]"
							type="checkbox"
							value="{{ $genre->id }}"
							id="genreCheck{{ $genre->id }}"
							{{ $genres->contains($genre) ? 'checked' : '' }}
						>
						<label class="form-check-label" for="genreCheck{{ $genre->id }}">
							{{ $genre->name }}
						</label>
					</div>
				@endforeach
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">プレイ人数</div>
			<div class="card-body">
				<input
					type="number"
					name="players"
					class="form-control"
					value="{{ $game->players }}"
					min="1"
					max="99"
				>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">公式サイト</div>
			<div class="card-body">
				<input
					type="text"
					name="offical_url"
					class="form-control"
					value="{{ $game->offical_url }}"
				>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">発売元</div>
			<div class="card-body">
				<input
					type="text"
					name="agency"
					class="form-control"
					value="{{ $game->agency }}">
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">TOP表示</div>
			<div class="card-body">
				@foreach ($feature_all as $k => $feature)
					<div class="form-check">
						<input
							class="form-check-input"
							name="categories[]"
							type="checkbox"
							value="{{ $feature['id'] }}"
							id="category{{ $feature['id'] }}"
							{{ $features[$k] ? 'checked' : '' }}
						>
						<label class="form-check-label" for="category{{ $feature['id'] }}">
							{{ $feature['title'] }}
						</label>
					</div>
				@endforeach
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">画像</div>
			<div class="card-body">
				@if ($game->image)
					<h5 class="mb-4">削除</h5>
					<div class="d-flex">
						@foreach ($game->image as $image)
							@if ($game->image->last() == $image)
								<div class="form-check pe-4 ms-4">
							@else
								<div class="form-check border-end pe-4 ms-4">
							@endif
								<input
									class="form-check-input"
									name="del_images[]"
									type="checkbox"
									value="{{ $image->id }}"
									id="del_image_{{ $image->id }}"
								>
								<label class="form-check-label" for="del_image_{{ $image->id }}">
									<img src="{{ Storage::url($image->image_path) }}" width="100">
								</label>
							</div>
						@endforeach
					</div>
				@endif
				<h5 class="my-4">追加</h5>
				<div id="game_edit">
					<input
						v-for="img in img_inputs"
						type="file"
						class="mb-3 me-3"
						name="image[]"
					>
					<div class="d-flex">
						<input
							type="button"
							@click="addImage(e)"
							value="追加"
							class="me-4 btn btn-dark"
						>
						<input
							type="button"
							@click="deleteImage()"
							value="削除"
							class="btn btn-secondary"
						>
					</div>
				</div>
			</div>
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-primary">編集する</button>
		</div>
	</form>

	<script src="https://unpkg.com/vue@next"></script>
	<script>
		const game_edit = Vue.createApp({
			data() {
				return {
					img_inputs: [true]
				}
			},
			mounted(){
				// console.log("mounted");
			},
			methods: {
				addImage() {
					this.img_inputs.push(true)
					console.log(this.img_inputs.length)
				},
				deleteImage() {
					if (this.img_inputs.length > 1) {
						this.img_inputs.splice(-1)
					}
				},
			}
		});
		game_edit.mount('#game_edit')
	</script>

@endsection