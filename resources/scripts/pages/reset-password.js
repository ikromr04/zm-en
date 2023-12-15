import axios from 'axios';

window.clearError = (input) => {
  input.closest('.field').removeAttribute('data-error');
};

document.querySelector('[type="submit"]').addEventListener('click', (evt) => {
  evt.preventDefault();
  evt.target.setAttribute('data-loading', 'loading');
  const form = evt.target.closest('form');

  axios.post('/users/reset-password', new FormData(form))
    .then(() => {
      window.location.href = '/';
    })
    .catch((error) => {
      if (error.response.data?.errors?.email) {
        form.querySelector('[name="email"]').closest('.field')
          .setAttribute('data-error', error.response.data.errors.email[0]);
      }
      if (error.response.data?.errors?.password) {
        form.querySelector('[name="password"]').closest('.field')
          .setAttribute('data-error', error.response.data.errors.password[0]);
      }
      if (error.response.data?.errors?.confirm_password) {
        form.querySelector('[name="confirm_password"]').closest('.field')
          .setAttribute('data-error', error.response.data.errors.confirm_password[0]);
      }
      if (error.response.data.message) {
        form.previousElementSibling.classList.add('text--error')
        form.previousElementSibling.textContent = error.response.data.message;
      }
      evt.target.removeAttribute('data-loading');
    })
});
