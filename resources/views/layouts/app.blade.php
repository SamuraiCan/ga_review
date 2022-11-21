<x-head.head />

{{-- @livewire('navigation-menu') --}}

<nav class="d-flex justify-content-between p-2">

  <div class="d-flex align-items-center">
    <a href="{{ route('dashboard') }}" class="navbar-brand">
      <img src="{{ asset('img/logo_256x256.png') }}" alt="">
    </a>
    <div class="">
      <a class="btn btn-secondary" href="{{ route('dashboard') }}">マイページ</a>
    </div>
  </div>

  <div class="d-flex align-items-center">
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
			<img
				class=""
				src="{{ Auth::user()->profile_photo_url }}"
				alt="{{ Auth::user()->name }}"
			/>
    @else
      <div class="me-2">{{ Auth::user()->name }}</div>
    @endif

    <div class="me-2">
			<a class="btn btn-info" href="{{ route('profile.show') }}">Profile</a>
		</div>

    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
      <a href="{{ route('api-tokens.index') }}">API Tokens</a>
    @endif

		<div class="">
			<form method="POST" action="{{ route('logout') }}" x-data>
				@csrf
				<input type="submit" class="btn btn-warning" href="{{ route('logout') }}" value="ログアウト">
			</form>
		</div>

  </div>

</nav>

<main>{{ $slot }}</main>

@stack('modals')

<x-footer.footer />
