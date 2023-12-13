@extends('layouts.app')

@section('content')
  <main class="user-page container">
    <div class="user-page__inner">
      <h1 class="visually-hidden">@lang('Избранные')</h1>

      <ul class="users-navigation">
        <li class="users-navigation__item">
          <a class="users-navigation__link button button--secondary">
            @lang('Избранные')
          </a>
        </li>
        <li class="users-navigation__item">
          <a
            class="users-navigation__link button button--gray"
            href="{{ route('users.profile', session('user')->id) }}"
          >
            @lang('Настройки профиля')
          </a>
        </li>
      </ul>

      <div id="root"></div>
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
    <input id="user-quotes" type="hidden" data-value="{{ json_encode($data->userQuotes) }}">
    <input id="user-folders" type="hidden" data-value="{{ json_encode($data->favorites) }}">
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/favorites.min.js') }}" type="module"></script>
  <script src="{{ asset('js/pages/user.min.js') }}" type="module"></script>
@endsection
