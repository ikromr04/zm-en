import axios from 'axios';
import '../global.js';

window.createNewSubFolder = (evt) => {
  axios.post('/favorites/create', {
    title: 'Новая папка',
    parent_id: evt.target.dataset.id,
  })
    .then(() => {
      document.location.reload(true);
    })
    .catch((error) => console.error(error));
}
