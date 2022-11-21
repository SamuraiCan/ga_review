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

      <form method="POST" action="member_login">
        @csrf
        <div class="p-3">
          @error('auth')
            <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="mb-4">
            <label for="email" class="form-label"><strong>メールアドレス</strong></label>
            <input id="email" class="form-control" type="text" name="email">
          </div>
          <div class="mb-4">
            <label for="password" class="form-label"><strong>パスワード</strong></label>
            <input id="password" class="form-control" type="password" name="password">
          </div>
          <div class="text-center">
            <button class="btn btn-primary" type="submit">ログイン</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection