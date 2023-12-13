import React, { useState } from 'react'
import style from './style.module.css'
import CreateSubfolder from '../create-subfolder/create-subfolder'

function Folder({ folder, setFolders }) {
  const [isCreating, setIsCreating] = useState(false)

  const handleClick = (evt) => {
    if (!evt.target.closest('button')) {
      setFolders((prevFolders) => {
        return prevFolders.map((prevFolder) => {
          if (prevFolder.id == folder.id) {
            return {
              ...prevFolder,
              isChecked: !prevFolder.isChecked
            }
          }
          return prevFolder
        })
      })
    }
  }

  const handleChildClick = (id) => () => {
    setFolders((prevFolders) => {
      return prevFolders.map((prevFolder) => {
        if (prevFolder.id == folder.id) {
          return {
            ...folder,
            children: folder.children.map((child) => {
              if (child.id == id) {
                return {
                  ...child,
                  isChecked: !child.isChecked
                }
              }
              return child
            })
          }
        }
        return prevFolder
      })
    })
  }

  return (
    <>
      <div className={style.folder} onClick={handleClick}>
        {folder?.isChecked
          ?
            <svg width="24" height="24">
              <use xlinkHref="/images/stack.svg#checked" />
            </svg>
          :
            <svg width="24" height="24">
              <use xlinkHref="/images/stack.svg#unchecked" />
            </svg>}
        {folder.title}

        <button
          className={style.button}
          type="button"
          onClick={() => setIsCreating(true)}
        >
          <svg width={24} height={24}>
            <use xlinkHref="/images/stack.svg#plus" />
          </svg>
          <span className={style.info}>Create subfolder</span>
        </button>
      </div>
      {isCreating && <CreateSubfolder folder={folder} setIsCreating={setIsCreating} setFolders={setFolders} />}
      {folder?.children?.map((folder) => (
        <div key={folder.id} className={style.child} onClick={handleChildClick(folder.id)}>
          {folder?.isChecked
            ?
              <svg width="24" height="24">
                <use xlinkHref="/images/stack.svg#checked" />
              </svg>
            :
              <svg width="24" height="24">
                <use xlinkHref="/images/stack.svg#unchecked" />
              </svg>}
          {folder.title}
        </div>
      )).reverse()}
    </>
  )
}

export default Folder
