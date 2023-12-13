const { default: axios } = require("axios");

const form = document.querySelector('.login');
const submitButton = form.querySelector('[type="submit"]')

form.addEventListener('input', () => {
  if (form.email.value && form.password.value) {
    submitButton.disabled = false;
    return;
  }
  submitButton.disabled = true;
});

form.addEventListener('submit', (evt) => {
  evt.preventDefault();

  axios
    .post(form.action, {
      email: form.email.value,
      password: form.password.value,
    })
    .then(({ data }) => {
      if (data.role === 'admin') {
        window.location.href = '/admin';
        return;
      }
      window.location.href = '/';
    })
    .catch(({ response }) => {
      console.log(response);
      form.querySelector('.login__error').innerHTML = response.data.error;
    });
});
