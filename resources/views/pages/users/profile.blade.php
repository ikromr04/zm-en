@extends('layouts.app')

@section('content')
  <main class="user-page container">
    <div class="user-page__inner">
      <ul class="users-navigation">
        <li class="users-navigation__item">
          <a
            class="users-navigation__link button button--gray"
            href="{{ route('favorites') }}"
          >
            @lang('Избранные')
          </a>
        </li>
        <li class="users-navigation__item">
          <a class="users-navigation__link button button--secondary">
            @lang('Настройки профиля')
          </a>
        </li>
      </ul>

      <section class="profile-section">
        <h2 class="profile-section__title title">@lang('Общая информация')</h2>

        <form class="profile-section__form form" action="{{ route('users.update', $data->user->id) }}" method="post" onsubmit="this.querySelector('button').setAttribute('disabled', 'disabled')">
          @csrf
          <div class="field{{ $errors->has('name') ? ' field--error' : '' }}" @if($errors->has('name')) data-error="{{ $errors->first('name') }}" @endif>
            <label class="field__label">
              <span>@lang('Имя')</span>
              <input class="field__input" name="name" type="text" oninput="window.clearError(this)" value="{{ old('name') ? old('name') : $data->user->name }}">
            </label>
          </div>
          @if (session('verify'))
            <div
              class="field field--error"
              data-error="{{  __('Пожалуйста подтвердите почту') . '(' . session('verify') . ')' }}"
            >
              <label class="field__label">
                <span>@lang('Электронная почта')</span>
                <input class="field__input" name="email" type="text" oninput="window.clearError(this)" value="{{ session('verify') }}">
              </label>
            </div>
          @else
            <div class="field{{ $errors->has('email') ? ' field--error' : '' }}" @if($errors->has('email')) data-error="{{ $errors->first('email') }}" @endif>
              <label class="field__label">
                <span>@lang('Электронная почта')</span>
                <input class="field__input" name="email" type="text" oninput="window.clearError(this)" value="{{ old('email') ? old('email') : $data->user->email }}">
              </label>
            </div>
          @endif

          <button class="form__submit button button--secondary" type="submit">
            @lang('Редактировать информацию')
          </button>
        </form>
      </section>

      <section class="profile-section" id="password">
        <h2 class="profile-section__title title">@lang('Пароль')</h2>

        <form class="profile-section__form form" action="{{ route('users.updatePassword', $data->user->id) }}#password" method="post">
          @if (Session::has('message'))
            <p class="text text--success">{{ Session::get('message') }}</p>
          @endif
          @csrf
          <div class="field{{ $errors->has('password') ? ' field--error' : '' }}" @if($errors->has('password')) data-error="{{ $errors->first('password') }}" @endif>
            <label class="field__label">
              <span class="visually-hidden">@lang('Пароль')</span>
              <input class="field__input" name="password" type="password" oninput="window.clearError(this)" placeholder="Пароль" value="{{ old('password') }}">
            </label>
          </div>
          <div class="field{{ $errors->has('new_password') ? ' field--error' : '' }}" @if($errors->has('new_password')) data-error="{{ $errors->first('new_password') }}" @endif>
            <label class="field__label">
              <span class="visually-hidden">@lang('Новый пароль')</span>
              <input class="field__input" name="new_password" type="password" oninput="window.clearError(this)" placeholder="Новый пароль" value="{{ old('new_password') }}">
            </label>
          </div>
          <div class="field{{ $errors->has('password_confirm') ? ' field--error' : '' }}" @if($errors->has('password_confirm')) data-error="{{ $errors->first('password_confirm') }}" @endif>
            <label class="field__label">
              <span class="visually-hidden">@lang('Подтвердите пароль')</span>
              <input class="field__input" name="password_confirm" type="password" oninput="window.clearError(this)" placeholder="Подтвердите пароль" value="{{ old('password_confirm') }}">
            </label>
          </div>

          <button class="form__submit button button--secondary" type="submit">
            @lang('Обновить пароль')
          </button>
        </form>
      </section>
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
