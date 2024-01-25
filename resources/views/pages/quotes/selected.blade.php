@extends('layouts.app')

@section('meta-tags')
  @php
    $share_text = preg_replace('#<[^>]+>#', ' ', $data->quote->quote);
    $share_text = mb_strlen($share_text) < 170 ? $share_text : mb_substr($share_text, 0, 166) . '...';
  @endphp
  <meta name="description" content="{{ $share_text }}">
  <meta property="og:title" content="Zafar Mirzo's Author Site" />
  <meta property="og:type" content="aside" />
  <meta property="og:url" content="https://zmquotes.com/" />
  <meta property="og:description" content="{{ $share_text }}">
  <meta property="og:image:alt" content="Zafar Mirzo's Author Site">
  <meta property="og:image" content="{{ asset('favicons/og.png') }}">

  <meta property="twitter:title" content="Zafar Mirzo's Author Site">
  <meta property="twitter:card" content="summary" />
  <meta property="twitter:description" content="{{ $share_text }}">
  <meta property="twitter:image" content="{{ asset('favicons/og.png') }}">
@endsection

@section('content')
  <main class="quote-selected container">
    <h1 class="visually-hidden">@lang('Из философского творчества')</h1>

    <x-quote-card :quote="$data->quote" />

    <x-tags-sidebar :tags="$data->tags" />
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/quotes/selected.min.js') }}" type="module"></script>
@endsection
