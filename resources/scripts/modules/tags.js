if (window.screen.width < 768) {
  const tags = document.querySelector('.tags');

  tags.classList.add('tags--hidden');

  document.addEventListener('click', (evt) => {
    if (evt.target.closest('.tags__title')) {
      tags.classList.toggle('tags--hidden')
    }
  })
}
