import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import { AppRoute } from '../../../const';
import PostsBoard from '../../ui/posts-board';

export default function PostsIndex() {
  return (
    <>
      <Typography component="h1" variant="h5">Картинки</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Typography color="text.primary">Картинки</Typography>
      </Breadcrumbs>

      <PostsBoard />
    </>
  );
}
