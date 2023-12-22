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

  const handleInputBlur = (evt) => {
    const title = evt.target.value
    if (title) {
      axios.post('/favorites/create', { title })
        .then(({ data }) => {
          setFolders((prevState) => {
            return [data, ...JSON.parse(JSON.stringify(prevState))]
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
        name="new_folder_name"
        onBlur={handleInputBlur}
        autoFocus />
    </form>
  )
}

export default CreateFolder
