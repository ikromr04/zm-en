@props(['class' => null])

@php
  $className = $class ? "$class main-navigation" : 'main-navigation';
  $route = request()
      ->route()
      ->getName();
@endphp

<nav class="{{ $className }}">
  <a class="main-navigation__link{{ $route == 'home' || $route == 'quotes.selected' ? ' main-navigation__link--current' : '' }}" @if ($route != 'home') href="{{ route('home') }}" @endif>
    @lang('Мысли')
  </a>

  <a class="main-navigation__link{{ $route == 'tags' || $route == 'tags.selected' ? ' main-navigation__link--current' : '' }}" @if ($route != 'tags') href="{{ route('tags') }}" @endif>
    @lang('Теги')
  </a>

  <a class="main-navigation__link{{ $route == 'author' ? ' main-navigation__link--current' : '' }}" @if ($route != 'author') href="{{ route('author') }}" @endif>
    @lang('Об авторе')
  </a>

  @if (session('user'))
    <button class="main-navigation__link main-navigation__link--account" type="button" onclick="window.showUserModal()">
      {{ session('user')->name }}
    </button>
  @else
    <button class="main-navigation__link main-navigation__link--login" type="button" onclick="window.showLoginModal()">
      <svg class="main-navigation__link-icon" width="20" height="20">
        <use xlink:href="{{ asset('images/stack.svg') }}#user" />
      </svg>
      @lang('Вход')
    </button>
  @endif

  <button class="main-navigation__link main-navigation__link--search" type="button" title="@lang('Поиск')">
    <svg class="main-navigation__link-icon" width="20" height="20">
      <use xlink:href="{{ asset('images/stack.svg') }}#search" />
    </svg>
  </button>
</nav>
