import { useState } from 'react';
import style from './style.module.css'
import Folder from '../folder/folder';
import MainFolder from '../main-folder/main-folder';
import axios from 'axios';
import CreateFolder from '../create-folder/create-folder';

function App() {
  const [folders, setFolders] = useState(JSON.parse(document.querySelector('#folders')?.dataset.value))
  const [isShown, setIsShown] = useState(false)
  const [isChecked, setIsChecked] = useState(false)
  const [quote, setQuote] = useState(null)
  const [isCreating, setIsCreating] = useState(false)
  const [isDisabled, setIsDisabled] = useState(false)

  window.showFavoriteModal = (evt) => {
    const main = JSON.parse(evt.target.dataset.all)
    const quote = JSON.parse(evt.target.dataset.quote)
    let quoteFolders = JSON.parse(evt.target.dataset.folders)
    quoteFolders = quoteFolders.map(({ id }) => id)
    !main ? setIsChecked(false) : setIsChecked(true)
    setQuote(quote)
    setIsShown(true)
    setFolders(folders?.map(({ id, title, children }) => ({
      id, title, isChecked: quoteFolders.includes(id),
      children: children.map(({ id, title }) => ({
        id, title, isChecked: quoteFolders.includes(id)
      }))
    })))
  }

  const handleSubmitClick = (evt) => {
    const ids = []
    isChecked && ids.push('all')
    folders.forEach((folder) => {
      folder.isChecked && ids.push(folder.id)
      folder?.children?.forEach((child) => child.isChecked && ids.push(child.id))
    });

    evt.target.setAttribute('data-loading', 'loading');

    axios.post('/favorites', { quote_id: quote.id, ids })
      .then(() => {
        window.location.reload()
        evt.target.removeAttribute('data-loading');
      })
      .catch(({ response }) => {
        console.error(response.data.message);
        evt.target.removeAttribute('data-loading');
      })
  }

  if (!isShown) {
    return null
  }

  return (
    <section className="modal">
      <div className="modal__container">
        <h2 className="modal__title title title--secondary">Select folder</h2>

        <MainFolder isChecked={isChecked} setIsChecked={setIsChecked} />

        {isCreating &&
          <CreateFolder
            setIsCreating={setIsCreating}
            setIsDisabled={setIsDisabled}
            setFolders={setFolders}
          />}

        <div className={style.folders}>
          {folders?.map((folder) => (
            <Folder
              key={folder.id}
              setFolders={setFolders}
              setIsDisabled={setIsDisabled}
              folder={folder} />
          ))}
        </div>

        <button className={style.newFolder} type="button" onClick={() => {setIsCreating(true); setIsDisabled(true)}}>
          <svg width={24} height={24}>
            <use xlinkHref="/images/stack.svg#plus" />
          </svg>
          Create new folder
        </button>

        <button
          className="button button--secondary"
          type="button"
          style={{ maxWidth: 'none' }}
          onClick={handleSubmitClick}
          disabled={isDisabled}
        >
          Save
        </button>

        <button
          className="modal__close"
          type="button"
          title="Close window"
          onClick={() => setIsShown(false)}
        >
          <svg width={16} height={16}>
            <use xlinkHref="/images/stack.svg#close" />
          </svg>
        </button>
      </div>
    </section>
  )
}

export default App
