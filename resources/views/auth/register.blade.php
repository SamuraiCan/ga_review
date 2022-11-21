@extends('layouts/layout')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-4 offset-md-4">

      <div class="logo-register text-center mb-4">
        <a href="/" class="d-inline-block">
          <img src="{{ asset('img/logo_256x256.png') }}" alt="ロゴ">
        </a>
      </div>

      @if ($errors->any())
        <div class="text-danger">{{ __('Whoops! Something went wrong.') }}</div>
          <ul class="mt-3 text-danger">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
          <label for="name" class="form-label"><strong>{{ __('名前') }}</strong></label>
          <input id="name" class="form-control" type="text" name="name" :value="old('name')" required
            autofocus autocomplete="name">
        </div>

        <div class="mb-4">
          <label for="name_kana" class="form-label"><strong>{{ __('フリガナ') }}</strong></label>
          <input id="name_kana" class="form-control" type="text" name="name_kana" :value="old('name_kana')" required
            autofocus autocomplete="name_kana">
        </div>

        <div class="mb-4">
          <label for="email" class="form-label"><strong>{{ __('メールアドレス') }}</strong></label>
          <input id="email" class="form-control" type="text" name="email" :value="old('email')" required
            autofocus autocomplete="email">
        </div>

        <div class="mb-4">
          <label for="password" class="form-label"><strong>{{ __('パスワード') }}</strong></label>
          <input id="password" class="form-control" type="password" name="password" :value="old('password')" required
            autofocus autocomplete="password">
        </div>

        <div class="mb-4">
          <label for="password_confirmation" class="form-label"><strong>{{ __('パスワードの確認') }}</strong></label>
          <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
            :value="old('password_confirmation')" required autofocus autocomplete="new-password">
        </div>

        <div class="mb-4">
          <label for="birth_date" class="form-label"><strong>{{ __('誕生日') }}</strong></label>
          <input id="birth_date" class="form-control" type="date" name="birth_date" :value="old('birth_date')"
            required>
        </div>

        <div class="mb-4">
          <label for="nickname" class="form-label"><strong>{{ __('レビューネーム') }}</strong></label>
          <input id="nickname" class="form-control" type="text" name="nickname" :value="old('nickname')" required>
        </div>

        {{-- <!-- level -->
        <div class="mb-4">
          <label for="level" class="form-label"><strong>{{ __('ゲームレベル') }}</strong></label>
          @for ($i = 1; $i <= 3; $i++)
            <div class="form-check">
              <input class="form-check-input" type="radio" id="level_{{ $i }}" name="level"
                value="{{ $i }}">
              <label class="form-check-label" for="level_{{ $i }}">レベル{{ $i }}</label>
            </div>
          @endfor
        </div>
 --}}
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
          <div class="mt-4">
            <label for="terms">
              <div class="d-flex align-items-center">
                <input type="checkbox" name="terms" id="terms" class="form-control">
                <div class="ml-2">
                  {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="">' . __('Privacy Policy') . '</a>',
  ]) !!}
                </div>
              </div>
            </label>
          </div>
        @endif

        <div class="d-flex align-items-center justify-content-end mt-4">
          <a class="" href="{{ route('login') }}">
            {{ __('ご登録済みの方はこちら') }}
          </a>
          <button class="btn btn-primary ms-4" type="submit">
            {{ __('新規登録') }}
          </button>
        </div>
      </form>

    </div>{{-- /.col --}}
  </div>{{-- /.row --}}
</div>{{-- /.container --}}

@endsection
