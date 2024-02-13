import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import { AppRoute } from '../../../const';
import UsersBoard from '../../ui/users-board';

export default function UsersIndex() {
  return (
    <>
      <Typography component="h1" variant="h5">Пользователи</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Typography color="text.primary">Пользователи</Typography>
      </Breadcrumbs>

      <UsersBoard />
    </>
  );
}
