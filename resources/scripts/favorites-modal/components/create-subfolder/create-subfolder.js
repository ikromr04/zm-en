import axios from 'axios'
import style from './style.module.css'

function CreateSubfolder({ setIsCreating, folder, setFolders }) {
  const handleFormSubmit = (evt) => {
    evt.preventDefault()
    const title = evt.target.new_subfolder_name.value
    if (!title) {
      setIsCreating(false)
    } else {
      axios.post('/favorites/create', {
        title,
        parent_id: folder.id,
      })
        .then(({ data }) => {
          setFolders((prevFolders) => prevFolders?.map((prevFolder) => {
            if (prevFolder.id == folder.id) {
              const index = prevFolder.children.findIndex(({ id }) => id == data.id)
              index < 0 && prevFolder.children.push({
                id: data.id,
                title: data.title,
                isChecked: true,
              })
            }
            return prevFolder
          }))
          setIsCreating(false)
        })
        .catch((error) => console.error(error));
    }
  }

  const handleInputBlur = (evt) => {
    const title = evt.target.value
    if (title) {
      axios.post('/favorites/create', {
        title,
        parent_id: folder.id,
      })
        .then(({ data }) => {
          setFolders((prevFolders) => prevFolders?.map((prevFolder) => {
            if (prevFolder.id == folder.id) {
              const index = prevFolder.children.findIndex(({ id }) => id == data.id)
              index < 0 && prevFolder.children.push({
                id: data.id,
                title: data.title,
                isChecked: false,
              })
            }
            return prevFolder
          }))
          setIsCreating(false)
        })
        .catch((error) => console.error(error));
    } else {
      setIsCreating(false)
    }
  }

  return (
    <form className={style.child} onSubmit={handleFormSubmit}>
      <svg width="24" height="24">
        <use xlinkHref="/images/stack.svg#unchecked" />
      </svg>
      <input
        className={style.input}
        placeholder="Enter title"
        name="new_subfolder_name"
        onBlur={handleInputBlur}
        autoFocus />
    </form>
  )
}

export default CreateSubfolder
