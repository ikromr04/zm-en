<header class="main-header main-header--collapsed">
  <div class="main-header__container container">
    <x-main-logo />

    <button class="menu-button" type="button" onclick="this.closest('.main-header').classList.toggle('main-header--collapsed')">
      <span class="visually-hidden">@lang('Переключить меню')</span>
      <svg class="menu-button__icon menu-button__icon--expand" width="18" height="12">
        <use xlink:href="{{ asset('images/stack.svg') }}#menu" />
      </svg>
      <svg class="menu-button__icon menu-button__icon--collapse" width="18" height="15">
        <use xlink:href="/images/stack.svg#close" />
      </svg>
    </button>

    <x-main-navigation />

    @if (session('user'))
      <x-profile />
    @else
      <button class="login-button" type="button" onclick="window.showLoginModal()">
        <svg width="20" height="20">
          <use xlink:href="{{ asset('images/stack.svg') }}#user" />
        </svg>
        @lang('Вход')
      </button>
    @endif
  </div>
</header>
