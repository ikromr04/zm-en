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
    <meta property="og:description" content="Scientific and educational media resource. Welcome to Zafar Mirzo's author's website! Awareness about the methods of personal development and improvement of professional">
    <meta property="og:title" content="Authors site Zafar Mirzo" />
    <meta property="og:image:alt" content="Zafar Mirzo – Logo">
    <meta property="og:image" content="{{ asset('favicons/og.png') }}">
    <meta name="twitter:title" content="Zafar Mirzo">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="{{ asset('favicons/og.png') }}">
  @endif
  {{-- --------- Meta tags end--------- --}}

  <title>@lang('Авторский сайт Зафара Мирзо')</title>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-C6RK0CGCLP"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-C6RK0CGCLP');
  </script>

  <!-- Yandex.Metrika counter -->
  <script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();
    for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
    k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(95305863, "init", {
          clickmap:true,
          trackLinks:true,
          accurateTrackBounce:true,
          webvisor:true
    });
  </script>
  <noscript><div><img src="https://mc.yandex.ru/watch/95305863" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->
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
