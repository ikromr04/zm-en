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
        autoFocus />

      <button
        className={`${style.button} ${style.buttonSuccess}`}
        type="submit"
      >
        <svg width={24} height={24}>
          <use xlinkHref="/images/stack.svg#plus" />
        </svg>
        <span className={style.info}>Create</span>
      </button>

      <button
        className={`${style.button} ${style.buttonError}`}
        type="reset"
        onClick={() => setIsCreating(false)}
      >
        <svg width={24} height={24}>
          <use xlinkHref="/images/stack.svg#cancel" />
        </svg>
        <span className={style.info}>Cancel</span>
      </button>
    </form>
  )
}

export default CreateSubfolder
