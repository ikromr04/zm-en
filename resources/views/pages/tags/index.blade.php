@extends('layouts.app')

@section('content')
  <main class="tags-page container">
    <div class="tags-page__right">
      <h1 class="tags-page__title title">@lang('Теги')</h1>

      @foreach ($data->tags as $tag)
        <h3 style="margin-bottom: 0">{{ $tag->title }}</h3>

        <ul class="tags-page__list">
          @foreach ($tag->children as $tag)
            <li class="tags-page__list-item">
              <a class="tags-page__list-link" href="{{ route('tags.selected', $tag->slug) }}">
                {{ $tag->title }}
              </a>
            </li>
          @endforeach
        </ul>
      @endforeach
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

@section('scripts')
  <script src="{{ asset('js/pages/tags/index.min.js') }}" type="module"></script>
@endsection
