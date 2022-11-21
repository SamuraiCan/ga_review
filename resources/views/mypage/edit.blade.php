@extends('layouts/layout')

@section('content')

	<h1 class="h5">マイページ</h1>

	<x-form-layout>
		<form action="{{ route('mypage.update') }}" method="POST">
			@method('PUT')
			@csrf
			<div class="mb-3">
				<div class="py-3">
					<label for="self_info" class="form-label">自己紹介</label>
					@if( old('self_info') )
						<textarea name="self_info" id="self_info" rows="5" class="w-100 form-control">{{old('self_info')}}</textarea>
					@else
						<textarea name="self_info" id="self_info" rows="5" class="w-100 form-control">{{$self_info}}</textarea>
					@endif
				</div>
				<div class="py-3">
					<label for="name" class="form-label">名前</label>
					@if( old('name') )
						<input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
					@else
						<input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
					@endif
				</div>
			</div>
			<div class="py-3">
				<label for="name_kana" class="form-label">フリガナ</label>
				@if( old('name_kana') )
					<input type="text" class="form-control" id="name_kana" name="name_kana" value="{{old('name_kana')}}">
				@else
					<input type="text" class="form-control" id="name_kana" name="name_kana" value="{{$user->name_kana}}">
				@endif
			</div>
			<div class="py-3">
				<label class="form-label">性別</label>
				@if ( old('sex') )
					<div class="form-check">
						<input class="form-check-input" type="radio" name="sex" id="sex1" value="1"{{ old('sex') == 1 ? ' checked' : '' }}>
						<label class="form-check-label" for="sex1">男性</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="sex" id="sex2" value="2"{{ old('sex') == 2 ? ' checked' : '' }}>
						<label class="form-check-label" for="sex2">女性</label>
					</div>
				@else
					<div class="form-check">
						<input class="form-check-input" type="radio" name="sex" id="sex1" value="1"{{ $mypage->sex == 1 ? ' checked' : '' }}>
						<label class="form-check-label" for="sex1">男性</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="sex" id="sex2" value="2"{{ $mypage->sex === 2 ? ' checked' : '' }}>
						<label class="form-check-label" for="sex2">女性</label>
					</div>
				@endif
			</div>
			<div class="py-3">
				<label for="birth_date" class="form-label">生年月日</label>
				@if ( old('birth_date') )
					<input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
				@else
					<input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $user->birth_date }}">
				@endif
			</div>
			<div class="py-3">
				<label class="form-label">所在地</label>
				<select name="area" class="form-select">
					<option selected>選択してください</option>
					@if ( old('area') )
						@foreach ($prefectures as $k => $v)
							<option value="{{ $k }}"{{ old('area') == $k ? ' selected' : ''}}>{{ $v }}</option>
						@endforeach
					@else
						@foreach ($prefectures as $k => $v)
							<option value="{{ $k }}"{{ $mypage->area == $k ? ' selected' : ''}}>{{ $v }}</option>
						@endforeach
					@endif
				</select>
			</div>
			<div class="py-3">
				<label for="tel" class="form-label">電話番号</label>
				@if ( old('tel') )
					<input type="tel" class="form-control" id="tel" name="tel" value="{{ old('tel') }}">
				@else
					<input type="tel" class="form-control" id="tel" name="tel" value="{{ $mypage->tel }}">
				@endif
			</div>
			<div class="py-3">
				<label for="nickname" class="form-label">クチコミネーム</label>
				@if ( old('nickname') )
					<input type="text" class="form-control" id="nickname" name="nickname" value="{{ old('nickname') }}">
				@else
					<input type="text" class="form-control" id="nickname" name="nickname" value="{{ $user->nickname }}">
				@endif
			</div>
			{{-- <div class="py-3">
				<label class="form-label">ゲームレベル</label>
				@if ( old('level') )
					<div class="form-check">
						<input class="form-check-input" type="radio" name="level" id="level1" value="1"{{ old('level') == 1 ? ' checked' : '' }}>
						<label class="form-check-label" for="level1">1</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="level" id="level2" value="2"{{ old('level') == 2 ? ' checked' : '' }}>
						<label class="form-check-label" for="level2">2</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="level" id="level3" value="3"{{ old('level') == 3 ? ' checked' : '' }}>
						<label class="form-check-label" for="level3">3</label>
					</div>
				@else
					<div class="form-check">
						<input class="form-check-input" type="radio" name="level" id="level1" value="1"{{ $user->level == 1 ? ' checked' : '' }}>
						<label class="form-check-label" for="level1">1</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="level" id="level2" value="2"{{ $user->level == 2 ? ' checked' : '' }}>
						<label class="form-check-label" for="level2">2</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="level" id="level3" value="3"{{ $user->level == 3 ? ' checked' : '' }}>
						<label class="form-check-label" for="level3">3</label>
					</div>
				@endif
			</div> --}}
			<div class="py-3">
				<label for="twitter" class="form-label">Twitter設定</label>
				<div class="d-flex align-items-center">
					@if ( old('twitter') )
						https://twitter.com/<input type="text" class="form-control ms-1" id="twitter" name="twitter" value="{{ old('twitter') }}">
					@else
						https://twitter.com/<input type="text" class="form-control ms-1" id="twitter" name="twitter" value="{{ $mypage->twitter }}">
					@endif
				</div>
			</div>
			<div class="py-3">
				<label for="genre" class="form-label">好きなゲームジャンル</label>
				@if ( is_array(old('genre')) )
					@foreach ($genres as $genre)
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="{{ $genre->id }}" id="genre_{{ $genre->id }}" name="genre[]"{{ array_keys(old('genre'), $genre->id) ? ' checked="checked"' : '' }}>
							<label class="form-check-label" for="genre_{{ $genre->id }}">
								{{ $genre->name }}
							</label>
						</div>
					@endforeach
				@else
					@foreach ($genres as $genre)
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="{{ $genre->id }}" id="genre_{{ $genre->id }}" name="genre[]"{{ in_array($genre->id, $mypage_genre_ids) ? ' checked="checked"' : '' }}>
							<label class="form-check-label" for="genre_{{ $genre->id }}">
								{{ $genre->name }}
							</label>
						</div>
					@endforeach
				@endif
			</div>
			<div class="mt-4">
				<button type="submit" class="btn btn-primary">編集する</button>
			</div>
		</form>
	</x-form-layout>

@endsection