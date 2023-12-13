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
          setFolders((prevState) => {
            return [data, ...JSON.parse(JSON.stringify(prevState))]
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
