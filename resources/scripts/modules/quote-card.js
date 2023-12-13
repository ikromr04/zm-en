document.addEventListener('click', (evt) => {
  if (evt.target.closest('.quote-card__button--toggle-tags')) {
    evt.target.closest('.quote-card').classList.toggle('tags-hidden');
  }
  if (evt.target.closest('[aria-label="Скопировать"]')) {
    const quote = evt.target.closest('blockquote').querySelector('q').textContent;
    const button = evt.target.closest('[aria-label="Скопировать"]');
    navigator.clipboard.writeText(quote)
      .then(() => {
        button.innerHTML = `
          <svg width="13" height="13">
            <use xlink:href="/images/stack.svg#copied"/>
          </svg>
        `;

        setTimeout(() => {
          button.innerHTML = `
            <svg width="13" height="13">
              <use xlink:href="/images/stack.svg#copy"/>
            </svg>
          `;
        }, 3000);
        console.log('Text copied to clipboard');
      })
      .catch((err) => console.error('Error in copying text: ', err));
  }
});
