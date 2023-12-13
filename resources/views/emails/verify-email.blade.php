<h1>@lang('Добро пожаловать на сайт zmquotes.com!')</h1>

<p>
  @lang('Уважаемый(ая)') {{ $user->name }}, <br>
  @lang('Благодарим вас за регистрацию на нашем веб-сайте! Мы рады приветствовать вас в нашем сообществе.')
</p>
<p>
  @lang('Ваш логин') {{ $user->email }} <br>
  @if ($password)
    @lang('Ваш пароль') {{ $password }}
  @endif
</p>

<section>
  <h2>@lang('Подтверждение электронной почты')</h2>
  <p>
    @lang('Пожалуйста, нажмите кнопку ниже, чтобы подтвердить свой адрес электронной почты')
  </p>

  @if ($user->update)
    <a href="{{ route('users.verifyEmail', ['id' => $user->id, 'hash' => $token, 'email' => $user->email]) }}">
      @lang('Подтвердить')
    </a>
  @else
    <a href="{{ route('auth.verifyEmail', ['id' => $user->id, 'hash' => $token]) }}">
      @lang('Подтвердить')
    </a>
  @endif
</section>

<p>
  @lang('Надеемся, что ваше времяпрепровождение здесь будет приятным и полезным.')
</p>

<p>
  @lang('Если у вас возникнут вопросы пожалуйста пишите на info@zmquotes.com, мы готовы помочь вам в любое время.')
</p>
