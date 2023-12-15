export const getForgotPasswordTemplate = () => `
  <section class="modal" onclick="window.closeModal(event, this)">
    <div class="modal__container">
      <h2 class="modal__title title title--secondary">Password reset</h2>
      <p class="modal__text text">Forgot your password? No problem. Just provide us with your email address, and we will send you a link that will allow you to choose a new one.</p>

      <form class="form">
        <div class="field">
          <label class="field__label">
            <span class="visually-hidden">Email</span>
            <input class="field__input" name="email" type="email" placeholder="Enter email address" oninput="window.clearError(this)">
          </label>
        </div>

        <button class="form__submit button button--secondary" type="submit" onclick="window.sendResetLink(event)">
          Send
        </button>
      </form>

      <button class="modal__close" type="button" title="Close window">
        <svg width="11" height="10">
          <use xlink:href="/images/stack.svg/#close" />
        </svg>
      </button>

      <button class="modal__back" type="button" onclick="window.handleForgotBack(event)">
        <svg width="18" height="12">
          <use xlink:href="/images/stack.svg/#back" />
        </svg>
        Back
      </button>
    </div>
  </section>
`;
