import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { generatePath, useParams } from 'react-router-dom';
import { ApiRoute, AppRoute } from '../../../const';
import { toast } from 'react-toastify';
import PostForm from '../../ui/post-form/post-form';

export default function PostsEdit() {
  const [post, setPost] = useState(null);
  const params = useParams();

  useEffect(() => {
    axios
      .get(generatePath(ApiRoute.Posts['show'], { id: params.id }))
      .then(({ data }) => setPost(data))
      .catch((error) => console.log(error));
  }, []);

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    axios
      .post(generatePath(ApiRoute.Posts['update'], { id: post.id }), new FormData(evt.target))
      .then(() => toast.success('Данные успешно сохранены'))
      .catch((error) => console.log(error));
  };

  return (
    <>
      <Typography component="h1" variant="h5">Картинки</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Posts['index']}>Картинки</Link>

        <Typography color="text.primary">Редактировать</Typography>
      </Breadcrumbs>

      {post && <PostForm onSubmit={handleFormSubmit} post={post} />}
    </>
  );
}
