<!DOCTYPE html>
<html class="page" lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="icon" href="{{ asset('favicons/favicon.svg') }}" type="image/svg+xml">
  <link rel="apple-touch-icon" href="{{ asset('favicons/180x180.png') }}">
  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
  <link rel="stylesheet" href="{{ asset('css/index.min.css') }}">

  {{-- ---------Meta tags start--------- --}}
  {{-- Same metas for all routes --}}
  <meta name="keywords" content="quotes Zafar Mirzo author's website self-development education science philosophy creativity motivation" />
  <meta property="og:site_name" content="Authors site Zafar Mirzo">
  <meta property="og:type" content="object" />
  <meta name="twitter:card" content="summary_large_image">

  @hasSection('meta-tags')
    @yield('meta-tags')
  @else
    <meta name="description" content="Scientific and educational media resource. Welcome to Zafar Mirzo's author's website! Awareness about the methods of personal development and improvement of professional">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Authors site Zafar Mirzo" />
    <meta property="og:description" content="Scientific and educational media resource. Welcome to Zafar Mirzo's author's website! Awareness about the methods of personal development and improvement of professional">
    <meta property="og:image" content="{{ asset('favicons/opengraph.png') }}">

    <meta name="twitter:title" content="Zafar Mirzo">
    <meta name="twitter:card" content="summary" />
    <meta property="twitter:description" content="Scientific and educational media resource. Welcome to Zafar Mirzo's author's website! Awareness about the methods of personal development and improvement of professional">
    <meta name="twitter:image" content="{{ asset('favicons/opengraph.png') }}">
  @endif
  {{-- --------- Meta tags end--------- --}}

  <title>@lang('Авторский сайт Зафара Мирзо')</title>
</head>

<body class="page__body">
  @include('layouts.header')

  @yield('content')

  @include('layouts.footer')

  <x-search-modal />

  <div style="position: absolute" id="favorites-modal"></div>

  <input id="folders" type="hidden" data-value="{{ json_encode(session('folders')) }}">
  <script src="{{ asset('js/favorites-modal.min.js') }}" type="module"></script>
  @yield('scripts')
</body>

</html>
