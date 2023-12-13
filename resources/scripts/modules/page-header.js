import axios from 'axios';
import { getLoginModaltemplate } from '../templates/login-modal-template';
import { createElement } from '../util';
import { getRegisterModalTemplate } from '../templates/register-modal-template';
import { getForgotPasswordTemplate } from '../templates/forgot-password-template';

window.showLoginModal = () => {
  const modal = createElement(getLoginModaltemplate());
  document.body.append(modal);
};

window.login = (evt) => {
  evt.preventDefault();
  const form = evt.target.closest('form');
  evt.target.setAttribute('data-loading', 'loading');

  axios.post('/auth/check', {
    email: form.email.value,
    password: form.password.value,
  })
    .then(() => {
      window.location.reload();
    })
    .catch(({ response }) => {
      if (response.data.errors.email) {
        form.querySelector('[name="email"]').closest('.field')
          .setAttribute('data-error', response.data.errors.email);
      }
      if (response.data.password || response.data.errors.password) {
        form.querySelector('[name="password"]').closest('.field')
          .setAttribute('data-error', response.data.password || response.data.errors.password);
      }
      evt.target.removeAttribute('data-loading');
    })
};

window.showUserModal = () => {
  document.querySelector('.profile__modal').classList.toggle('profile__modal--hidden');
};

window.updateUserAvatar = (input) => {
  const formData = new FormData();
  const userId = input.dataset.userId;
  const img = document.querySelector('.profile__modal img');
  formData.append('avatar', input.files[0]);
  img.setAttribute('src', '/images/spinner.gif');
  img.style.objectFit = 'contain';

  axios
    .post(`/users/${userId}/avatar`, formData)
    .then(({ data }) => {
      document.querySelector('.profile__modal img').setAttribute('src', data);
      img.style.objectFit = 'cover';
    })
    .catch((error) => {
      console.log(error.response);
      img.setAttribute('src', '/images/default-avatar.png');
      img.style.objectFit = 'cover';
    });
};

window.showRegisterModal = () => {
  document.querySelector('.modal--login')?.remove();
  const modal = createElement(getRegisterModalTemplate());
  document.body.append(modal);
};

window.handleRegisterBack = (evt) => {
  evt.target.closest('.modal').remove();
  window.showLoginModal();
};

window.register = (evt) => {
  evt.preventDefault();
  const form = evt.target.closest('form');
  evt.target.setAttribute('data-loading', 'loading');

  axios.post('/users/register', new FormData(form))
    .then(() => {
      window.location.reload();
    })
    .catch((error) => {
      if (error.response.data.errors.name) {
        form.querySelector('[name="name"]').closest('.field')
          .setAttribute('data-error', error.response.data.errors.name[0]);
      }
      if (error.response.data.errors.email) {
        form.querySelector('[name="email"]').closest('.field')
          .setAttribute('data-error', error.response.data.errors.email[0]);
      }
      if (error.response.data.errors.password) {
        form.querySelector('[name="password"]').closest('.field')
          .setAttribute('data-error', error.response.data.errors.password[0]);
      }
      if (error.response.data.errors.confirm_password) {
        form.querySelector('[name="confirm_password"]').closest('.field')
          .setAttribute('data-error', error.response.data.errors.confirm_password[0]);
      }
      evt.target.removeAttribute('data-loading');
    })
};

window.showForgotPasswordModal = () => {
  document.querySelector('.modal--login')?.remove();
  const modal = createElement(getForgotPasswordTemplate());
  document.body.append(modal);
};

window.handleForgotBack = (evt) => {
  evt.target.closest('.modal').remove();
  window.showLoginModal();
};

window.sendResetLink = (evt) => {
  evt.preventDefault();
  evt.target.setAttribute('data-loading', 'loading');
  const form = evt.target.closest('form');
  const email = form.email.value;

  axios.post('/users/forgot-password', { email })
    .then(({ data }) => {
      form.previousElementSibling.classList.add('text--success')
      form.previousElementSibling.textContent = data.message;
      form.remove();
      evt.target.removeAttribute('disabled');
    })
    .catch((error) => {
      if (error.response.data.email) {
        form.querySelector('[name="email"]').closest('.field')
          .setAttribute('data-error', error.response.data.email);
      }
      evt.target.removeAttribute('data-loading');
    })
}
