<!doctype html>
<html class="page" lang="ru">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="robots" content="noindex">

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="icon" href="{{ asset('favicons/favicon.svg') }}" type="image/svg+xml">
  <link rel="apple-touch-icon" href="{{ asset('favicons/180x180.png') }}">
  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">

  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

  <title>Админ панель ZM</title>
</head>

<body class="page__body">
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div class="page__root" id="root"></div>

  <script src="{{ asset('plugins/jquery/jquery-3.6.4.min.js') }}"></script>
  <script src="{{ asset('plugins/jquery/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('plugins/jq-nested/jq-nested-sortable.js') }}"></script>
  <script src="{{ asset('js/admin.min.js') }}"></script>
</body>

</html>
