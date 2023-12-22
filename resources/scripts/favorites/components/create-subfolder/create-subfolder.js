import axios from 'axios'
import style from './style.module.css'

function CreateSubfolder({ setIsCreating, folder, setFolder }) {
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
          setFolder({
            ...folder,
            children: [...folder.children, data]
          })
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
          setFolder({
            ...folder,
            children: [...folder.children, data]
          })
          setIsCreating(false)
        })
        .catch((error) => console.error(error));
    } else {
      setIsCreating(false)
    }
  }

  return (
    <form className={style.folder} onSubmit={handleFormSubmit}>
      <svg
        className={style.icon}
        width={24}
        height={24}
      >
        <use xlinkHref="/images/stack.svg#folder" />
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
