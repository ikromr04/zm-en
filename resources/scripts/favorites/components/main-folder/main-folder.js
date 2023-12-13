import { useState } from 'react'
import style from './style.module.css'
import { useEffect } from 'react'

function MainFolder() {
  const [count, setCount] = useState(null)

  useEffect(() => {
    const quotes =
      JSON.parse(document.querySelector('input[id="user-quotes"]').dataset.value)
    setCount([...new Set(quotes.map(({ id }) => id))].length);
  }, [setCount])

  return (
    <a className={style.folder} href="/favorites/all">
      <svg width={24} height={24}>
        <use xlinkHref="/images/stack.svg#folder-star" />
      </svg>
      {count ? `(${count})` : '(0)'} Favorites
    </a>
  )
}

export default MainFolder
