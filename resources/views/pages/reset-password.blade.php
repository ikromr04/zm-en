<!DOCTYPE html>
<html class="page" lang="{{ app()->currentLocale() }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="noindex">

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="icon" href="{{ asset('favicons/favicon.svg') }}" type="image/svg+xml">
  <link rel="apple-touch-icon" href="{{ asset('favicons/180x180.png') }}">
  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
  <link rel="stylesheet" href="{{ asset('css/index.min.css') }}">

  <title>@lang('Авторский сайт Зафара Мирзо')</title>
</head>

<body class="page__body">
  <main>
    <section class="modal" style="background-color: #fafafa;">
      <div class="modal__container" style="background-color: white;">
        <h2 class="modal__title title title--secondary">@lang('Сброс пароля')</h2>
        <p class="modal__text text">
          @lang('Обновите пароль, чтобы получить доступ к своей учетной записи')
        </p>

        <form class="form">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="field">
            <label class="field__label">
              <span class="visually-hidden">@lang('Электронная почта')</span>
              <input
                class="field__input"
                name="email"
                type="email"
                placeholder="@lang('Эл. почта')"
                oninput="window.clearError(this)">
            </label>
          </div>
          <div class="field">
            <label class="field__label">
              <span class="visually-hidden">@lang('Пароль')</span>
              <input class="field__input" name="password" type="password" placeholder="@lang('Пароль')" oninput="window.clearError(this)">
            </label>
          </div>
          <div class="field">
            <label class="field__label">
              <span class="visually-hidden">@lang('Пароль')</span>
              <input class="field__input" name="confirm_password" type="password" placeholder="@lang('Подтвердите пароль')" oninput="window.clearError(this)">
            </label>
          </div>

          <button class="form__submit button button--secondary" type="submit">
            @lang('Сбросить')
          </button>
        </form>
      </div>
    </section>
  </main>

  <script src="{{ asset('js/pages/reset-password.min.js') }}" type="module"></script>
</body>

</html>
