@extends('layouts.app')

@section('content')
  <main class="author-page container">
    <div class="author-page__author">
      <img
        class="author-page__image"
        src="{{ asset('images/author.jpg') }}"
        width="419"
        height="421"
        alt="Зафар Мирзо"
        loading="lazy">
    </div>

    <h1 class="author-page__title">
      @lang('Авторский сайт') <br>
      @lang('Зафар Мирзо')
    </h1>

    <div class="author-page__info">
      <p class="author-page__info-item">
        @lang('Предприниматель и писатель | Философия, Космология, Жизненные ценности, Современный человек и Личностный рост.')
      </p>
      <p class="author-page__info-item">
        @lang('1 Мая 1972')
      </p>
      <p class="author-page__info-item">
        @lang('Социальные сети')
        <a
          style="
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 24px;
            height: 24px;
            color: #111;
          "
          href="https://twitter.com/zafarmirzo"
          title="@lang('Твиттер')"
          target="_blank"
        >
          <svg width="20" height="16">
            <use xlink:href="{{ asset('images/stack.svg') }}#twitter" />
          </svg>
        </a>
      </p>
    </div>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/author/index.min.js') }}" type="module"></script>
@endsection
