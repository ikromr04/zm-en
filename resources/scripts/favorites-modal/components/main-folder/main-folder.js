import React from 'react'
import style from './style.module.css'

function MainFolder({ isChecked, setIsChecked }) {
  return (
    <div className={style.folder} onClick={() => setIsChecked(!isChecked)}>
      {isChecked
        ?
          <svg width="24" height="24">
            <use xlinkHref="/images/stack.svg#checked" />
          </svg>
        :
          <svg width="24" height="24">
            <use xlinkHref="/images/stack.svg#unchecked" />
          </svg>}
      Favorites
    </div>
  )
}

export default MainFolder
