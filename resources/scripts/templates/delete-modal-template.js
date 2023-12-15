export const getDeleteModaltemplate = (id) => `
  <section class="modal modal--login" onclick="window.closeModal(event, this)">
    <div class="modal__container">
      <p class="modal__text text">Are you sure you want to delete this folder??</p>

      <form class="form">
        <button class="form__submit button button--secondary" type="submit" onclick="window.deleteFolder(${id})">
          Delete
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
