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
        <svg width="11" height="10">
          <use xlink:href="/images/stack.svg#close"/>
        </svg>
      </button>
    </div>
  </section>
`;
