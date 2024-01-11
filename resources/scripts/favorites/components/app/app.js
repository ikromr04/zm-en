import { useEffect, useState } from 'react'
import MainFolder from '../main-folder/main-folder'
import style from './style.module.css'
import Folder from '../folder/folder'
import CreateFolder from '../create-folder/create-folder'

function App() {
  const [folders, setFolders] = useState(null)
  const [isCreating, setIsCreating] = useState(false)

  useEffect(() => {
    const folders =
      JSON.parse(document.querySelector('input[id="user-folders"]').dataset.value)

    setFolders(folders)
  }, [])

  return (
    <div className={style.folders}>
      <button
        className="button button--secondary"
        type="button"
        onClick={() => setIsCreating(true)}
        disabled={isCreating}
        style={{
          fontSize: '14px'
        }}
      >
        Create new folder
      </button>

      <MainFolder />

      {isCreating && <CreateFolder setIsCreating={setIsCreating} setFolders={setFolders} />}

      {folders?.map((folder) => (
        <Folder
          key={folder.id}
          folder={folder}
          setFolders={setFolders}
        />
      ))}
    </div>
  )
}

export default App
