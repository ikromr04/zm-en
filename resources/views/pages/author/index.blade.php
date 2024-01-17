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
        Welcome to my personal website, dedicated to important and relevant topics of modern society. On this website, you will find thoughts and reflections in their brief form, accumulated by me over many years, that reveal new facets of various concepts and definitions, as well as my opinions and views on important issues such as the modern individual, life values and ethics, society, enlightenment, and ultimate questions about the world. <br> <br>
        The main focus of my work is to contribute to the development of personality and self-realization. Understanding the importance of popularizing knowledge and making information accessible, the thoughts are presented in a way that makes their study easy, interesting, and informative. <br> <br>
        I have been publishing on the internet since 2017. You can also find my work on Twitter and on other thematic platforms on the internet. To help you better understand my ideas and participate in discussions, you will find links to my Twitter posts on many of my thoughts. This will give you the opportunity to see reactions and comments from other readers, as well as share your own views. <br> <br>
        Enjoy your reading, friends, we hope it brings you new ideas and inspiration. <br> <br>
        Sincerely, Zafar Mirzo
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
