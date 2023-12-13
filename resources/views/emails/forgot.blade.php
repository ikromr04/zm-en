<h1>@lang('Забыли пароль')</h1>

<p>@lang('Вы можете сбросить пароль по ссылке ниже')</p>
<a href="{{ route('users.resetPassword', $token) }}">@lang('Сбросить пароль')</a>
