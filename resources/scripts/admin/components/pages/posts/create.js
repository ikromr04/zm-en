import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import { ApiRoute, AppRoute } from '../../../const';
import PostForm from '../../ui/post-form/post-form';
import { toast } from 'react-toastify';

export default function PostsCreate() {
  const navigate = useNavigate();

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    axios
      .post(ApiRoute.Posts['store'], new FormData(evt.target))
      .then(() => navigate(AppRoute.Posts['index']))
      .catch(({ response }) => toast.error(response.data.message));
  };

  return (
    <>
      <Typography component="h1" variant="h5">Картинки</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Posts['index']}>Картинки</Link>

        <Typography color="text.primary">Добавить</Typography>
      </Breadcrumbs>

      <PostForm onSubmit={handleFormSubmit} />
    </>
  );
}
