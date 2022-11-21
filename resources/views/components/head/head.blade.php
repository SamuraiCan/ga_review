<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  {{-- @includeWhen(config("app.ga"), 'ga') --}}
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="{{ config('app.description') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @hasSection('title')
    <title>@yield('title') | {{ config('app.name') }}</title>
  @else
    <title>{{ config('app.name') }}</title>
  @endif
  <link rel="icon" type="image/png" sizes="16x16"  href="{{ asset('img/favicon-16x16.png') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  {{-- @vite('resources/css/app.css') --}}
  @vite('resources/css/style.scss')
  @vite('resources/js/app.js')
  @livewireStyles
  @hasSection('title')
    <meta property="og:title" content="@yield('title') | {{ config('app.name') }}" />
  @else
    <meta property="og:title" content="{{ config('app.name') }}" />
  @endif
  <meta property="og:description" content="{{ config('app.description') }}" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:image" content="{{ url('/', null, true) }}/img/eyecatch_900x600.jpg" />
  <meta property="og:site_name" content="{{ config('app.name') }}" />
  <meta property="og:locale" content="ja_JP" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>