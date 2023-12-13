@props(['class' => null])

@php
  $className = $class ? "$class search-modal" : 'search-modal';
@endphp

<dialog class="{{ $className }}">
  <h2 class="search-modal__title title">@lang('Поиск по сайту')</h2>

  <form
    class="search-modal__form"
    action="{{ route('quotes.search') }}"
    method="get"
    onsubmit="return false"
  >
    <label
      class="visually-hidden"
      for="search-keyword"
    >
      @lang('Поиск по сайту')
    </label>
    <input
      class="search-modal__input"
      id="search-keyword"
      type="search"
      placeholder="@lang('Введите ключевое слово')"
      autocomplete="off"
    >
    <div class="search-modal__results"></div>
  </form>


  <button
    class="search-modal__close"
    type="button"
    aria-label="@lang('Закрыть окно')"
  >
    <svg
      width="18"
      height="15"
    >
      <use xlink:href="{{ asset('images/stack.svg') }}#close" />
    </svg>
  </button>
</dialog>
