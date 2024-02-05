@extends('layouts.app')

@section('content')
  <main class="search-page container">
    <div class="search-page__right">
      <h1 class="title">Search</h1>

      <form class="search-page__form" action="{{ route('quotes.search') }}" method="GET">
        @csrf
        <input class="search-page__field" type="search" name="keyword" placeholder="Part of the quote" autocomplete="off" value="{{ request()->query('keyword') }}">
        <button class="search-page__submit button button--secondary" type="submit">Search</button>
      </form>

      @if ($data->quotes != null)
        <section class="quotes">
          <ul class="quotes__list">
            @foreach ($data->quotes as $quote)
              <li class="quotes__item">
                <x-quote-card :quote="$quote" />
              </li>
            @endforeach
          </ul>
        </section>
      @endif
      @if ($data->quotes === null)
        <figure class="alert-warning">
          <figcaption>Um...</figcaption>
          <p>Although we did our best, we did not find any quotes. Please edit your search phrase.</p>
        </figure>
      @endif
    </div>

    <aside class="posts">
      <h2 class="visually-hidden">@lang('Картинки')</h2>

      <ul class="posts__list">
        @foreach ($data->posts as $post)
          <li class="posts__item">
            <x-post-card :post="$post" />
          </li>
        @endforeach
      </ul>
    </aside>
  </main>
@endsection
