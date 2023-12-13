import style from './ImageField.module.css';
import { Typography } from '@mui/material';
import { useEffect, useState } from 'react';

function ImageField(props) {
  const [image, setImage] = useState(props.image);

  useEffect(() => setImage(props?.image), [props?.image])

  const handleInputChange = (evt) => {
    setImage(URL.createObjectURL(evt.target.files[0]));
  };

  return (
    <label className={style.imageField}>
      {image
        ?
        <>
          <img className={style.imageFieldImage} src={image} alt="" />
          <Typography className={style.imageFieldEdit}>Редактировать</Typography>
        </>
        :
        <Typography className={style.imageFieldText}>
          Нажмите чтобы выбрать изображение*
        </Typography>
      }
      <input
        className="visually-hidden"
        type="file"
        name="image"
        onChange={handleInputChange}
        accept="image/*"
        required={!props?.image}
      />
    </label>
  );
}

export default ImageField;
