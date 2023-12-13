@extends('layouts.app')

@section('content')
  <main class="user-page container">
    <div class="user-page__inner">
      <ul class="users-navigation">
        @if ($data->favorite)
          <li class="users-navigation__item">
            <a class="users-navigation__link button button--secondary">
              {{ $data->favorite->title }}
            </a>
          </li>
        @endif
        <li class="users-navigation__item">
          <a
            class="users-navigation__link button button--{{ $data->favorite ? 'gray' : 'secondary' }}"
            href="{{ route('favorites') }}"
          >
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

      @if (count($data->quotes) == 0)
        <p>@lang('Список пуст')</p>
      @else
        <section class="quotes">
          <h2 class="visually-hidden">@lang('Мысли автора')</h2>

          <ul class="quotes__list">
            @foreach ($data->quotes as $quote)
              <li class="quotes__item">
                <x-quote-card :quote="$quote" />
              </li>
            @endforeach
          </ul>

          {{-- {{ $data->quotes->links('components.pagination') }} --}}
        </section>
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

@section('scripts')
  <script src="{{ asset('js/pages/user.min.js') }}" type="module"></script>
@endsection
