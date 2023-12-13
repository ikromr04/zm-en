import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import { ApiRoute, AppRoute } from '../../../const';
import QuoteForm from '../../ui/quote-form/quote-form';
import { toast } from 'react-toastify';

export default function QuotesCreate() {
  const navigate = useNavigate();

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    axios
      .post(ApiRoute.Quotes['store'], {
        quote: evt.target.quote.value,
        twitter: evt.target.twitter.value,
        tags: evt.target.tags.value.split(','),
      })
      .then(() => navigate(AppRoute.Quotes['index']))
      .catch(({ response }) => toast.error(response.data.message));
  };

  return (
    <>
      <Typography component="h1" variant="h5">Мысли</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Quotes['index']}>Мысли</Link>

        <Typography color="text.primary">Добавить</Typography>
      </Breadcrumbs>

      <QuoteForm onSubmit={handleFormSubmit} />
    </>
  );
}
