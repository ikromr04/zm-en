import axios from 'axios';
import './modules/page-header.js';
import './modules/search-modal.js';
import { createElement } from './util.js';
import { getTermsOfUseModaltemplate } from './templates/terms-of-use-modal-template.js';
import { getPrivacyPolicyModaltemplate } from './templates/privacy-policy-modal-template.js';

window.closeModal = (evt, modal, boolean = false) => {
  if (evt.target.classList.contains('modal') && boolean) {
    modal.remove();
  }
  if (evt.target.classList.contains('modal__close')) {
    modal.remove();
  }
};

window.clearError = (input) => {
  input.closest('.field').removeAttribute('data-error');
};

window.showTermsOfUseModal = () => {
  document.querySelector('.modal--login')?.remove();
  const modal = createElement(getTermsOfUseModaltemplate());
  document.body.append(modal);
};

window.showPrivacyPolicyModal = () => {
  document.querySelector('.modal--login')?.remove();
  const modal = createElement(getPrivacyPolicyModaltemplate());
  document.body.append(modal);
};

// window.showFavoriteModal = (evt) => {
//   const quote = JSON.parse(evt.target.dataset.quote);
//   const quoteFolders = JSON.parse(evt.target.dataset.folders);
//   const favorites = document.querySelector('#folders')?.dataset.value;
//   let folders = JSON.parse(favorites);
//   let all = JSON.parse(evt.target.dataset.all);
//   console.log(evt.target.dataset.all);

//   folders = folders.map((folder) => {
//     folder.checked = quoteFolders.find(({ id }) => folder.id == id);
//     folder.children = folder.children.map((folder) => {
//       folder.checked = quoteFolders.find(({ id }) => folder.id == id);
//       return folder;
//     })
//     return folder;
//   });
//   const modal = createElement(getFavoritesModalTemplate(folders, quote, all));
//   document.body.append(modal);
// };

window.addToFavorites = (evt) => {
  const inputs = evt.target.closest('.modal').querySelectorAll('input:checked');
  const ids = Array.from(inputs).map((input) => input.value);

  evt.target.setAttribute('data-loading', 'loading');

  axios.post('/favorites', {
    quote_id: evt.target.dataset.quoteId,
    ids,
  })
    .then(() => {
      window.location.reload();
      evt.target.removeAttribute('data-loading');
    })
    .catch(({ response }) => {
      console.error(response.data.message);
      evt.target.removeAttribute('data-loading');
    })
};
