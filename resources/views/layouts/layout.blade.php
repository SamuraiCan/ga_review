<x-head.head />

<x-nav.head />

@if (\Route::currentRouteName() == 'home')
  <x-head.slide />
@endif

<div class="container py-4">
  @yield('content')
</div>

<x-footer.footer />