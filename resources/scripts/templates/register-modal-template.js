export const getRegisterModalTemplate = () => `
  <section class="modal" onclick="window.closeModal(event, this)">
    <div class="modal__container">
      <h2 class="modal__title title title--secondary">Registration</h2>
      <p class="modal__text text">Register to access the author's resource</p>

      <form class="form">
        <div class="field">
          <label class="field__label">
            <span class="visually-hidden">Name</span>
            <input class="field__input" name="name" type="text" placeholder="What is your name?" oninput="window.clearError(this)">
          </label>
        </div>
        <div class="field">
          <label class="field__label">
            <span class="visually-hidden">Email</span>
            <input class="field__input" name="email" type="email" placeholder="Email" oninput="window.clearError(this)">
          </label>
        </div>
        <div class="field">
          <label class="field__label">
            <span class="visually-hidden">Password</span>
            <input class="field__input" name="password" type="password" placeholder="Password" oninput="window.clearError(this)">
          </label>
        </div>
        <div class="field">
          <label class="field__label">
            <span class="visually-hidden">Password confirmation</span>
            <input class="field__input" name="confirm_password" type="password" placeholder="Confirm password" oninput="window.clearError(this)">
          </label>
        </div>

        <button class="form__submit button button--secondary" type="submit" onclick="window.register(event)">
          Register
        </button>
      </form>

      <button class="modal__close" type="button" title="Close window">
        <svg width="11" height="10">
          <use xlink:href="/images/stack.svg/#close" />
        </svg>
      </button>

      <button class="modal__back" type="button" onclick="window.handleRegisterBack(event)">
        <svg width="18" height="12">
          <use xlink:href="/images/stack.svg/#back" />
        </svg>
        Back
      </button>
    </div>
  </section>
`;
