import axios from 'axios'
import style from './style.module.css'

function CreateFolder({ setIsCreating, setFolders }) {
  const handleFormSubmit = (evt) => {
    evt.preventDefault()
    const title = evt.target.new_folder_name.value
    if (!title) {
      setIsCreating(false)
    } else {
      axios.post('/favorites/create', { title })
        .then(({ data }) => {
          setFolders((prevFolders) => {
            const index = prevFolders.findIndex(({ id }) => id == data.id)
            index < 0 && prevFolders.unshift({
              id: data.id,
              title: data.title,
              children: data.children,
              isChecked: false,
            })
            return prevFolders
          })
          setIsCreating(false)
        })
        .catch((error) => console.error(error));
    }
  }

  return (
    <form className={style.folder} onSubmit={handleFormSubmit}>
      <svg width="24" height="24">
        <use xlinkHref="/images/stack.svg#unchecked" />
      </svg>
      <input
        className={style.input}
        placeholder="Enter title"
        name="new_folder_name"
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

export default CreateFolder
