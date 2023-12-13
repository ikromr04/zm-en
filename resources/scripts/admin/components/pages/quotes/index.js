import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import { AppRoute } from '../../../const';
import QuotesBoard from '../../ui/quotes-board';

export default function QuotesIndex() {
  return (
    <>
      <Typography component="h1" variant="h5">Мысли</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Typography color="text.primary">Мысли</Typography>
      </Breadcrumbs>

      <QuotesBoard />
    </>
  );
}
