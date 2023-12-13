<footer class="page-footer">
  <div class="page-footer__container container">
    <p class="page-footer__copyright">
      <span>
        © @lang('Зафар Мирзо') <br>
        2017 - {{ date('Y') }}
      </span>
    </p>

    <div class="page-footer__links">
      <a onclick="window.showTermsOfUseModal()">@lang('Пользовательское соглашение')</a>
      <a onclick="window.showPrivacyPolicyModal()">@lang('Политика конфиденциальности')</a>
    </div>

    <p class="page-footer__feedback">
      @lang('Обратная связь') <br>
      <a href="mailto:info@zmquotes.com">info@zmquotes.com</a>
    </p>
  </div>
</footer>
