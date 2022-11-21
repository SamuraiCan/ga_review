<x-head.head />

<x-nav.head />

@if (\Route::currentRouteName() == 'home')
  <x-head.slide />    
@endif

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12 col-lg-8 col-xl-9 col-xxl-10">
      @yield('content')
    </div>
    <div class="col-12 col-lg-4 col-xl-3 col-xxl-2">
      <x-sidebar.right />
    </div>
  </div>
</div>

<x-footer.footer />