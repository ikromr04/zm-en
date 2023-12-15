export const getLoginModaltemplate = () => `
  <section class="modal modal--login" onclick="window.closeModal(event, this)">
    <div class="modal__container">
      <h2 class="modal__title title title--secondary">Login</h2>
      <p class="modal__text text">Log into your account <br/> or register</p>

      <form class="form">
        <div class="field">
          <label class="field__label">
            <span class="visually-hidden">Email</span>
            <input class="field__input" name="email" type="email" placeholder="Email" oninput="window.clearError(this)">
          </label>
        </div>
        <div class="field">
          <label class="field__label">
            <span class="visually-hidden">Password</span>
            <input class="field__input" name="password" type="password" placeholder="password" oninput="window.clearError(this)">
          </label>
        </div>

        <div class="form__links">
          <a class="text" onclick="window.showRegisterModal()" style="cursor: pointer">New user?</a>
          <a class="text text--error" onclick="window.showForgotPasswordModal()" style="cursor: pointer">Forgot password?</a>
        </div>
        <p class="form__aware">
          By logging in, you accept the terms set out in the
          <span style="text-decoration: underline; cursor: pointer;" onclick="window.showTermsOfUseModal()">User Agreement</span>
          and consent to the processing of
          <span style="text-decoration: underline; cursor: pointer;" onclick="window.showPrivacyPolicyModal()">personal data</span>.
        </p>

        <button class="form__submit button button--secondary" type="submit" onclick="window.login(event)">
          Login
        </button>
      </form>

      <button class="modal__close" type="button" title="Close window">
        <svg width="11" height="10" fill="none">
          <path d="m9.5 1-8 8M1.5 1l8 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>
    </div>
  </section>
`;
