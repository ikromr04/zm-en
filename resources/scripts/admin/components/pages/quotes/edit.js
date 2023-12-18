import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { generatePath, useParams } from 'react-router-dom';
import { ApiRoute, AppRoute } from '../../../const';
import { toast } from 'react-toastify';
import QuoteForm from '../../ui/quote-form/quote-form';

export default function QuotesEdit() {
  const [quote, setQuote] = useState(null);
  const params = useParams();

  useEffect(() => {
    axios
      .get(generatePath(ApiRoute.Quotes['show'], { id: params.id }))
      .then(({ data }) => setQuote(data))
      .catch((error) => console.log(error));
  }, []);

  const handleFormSubmit = (evt) => {
    evt.preventDefault();
    
    axios
      .post(generatePath(ApiRoute.Quotes['update'], { id: quote.id }), {
        quote: evt.target.quote.value,
        twitter: evt.target.twitter.value,
        tags: evt.target.tags.value.split(','),
      })
      .then(() => toast.success('Данные успешно сохранены'))
      .catch((error) => console.log(error));
  };

  return (
    <>
      <Typography component="h1" variant="h5">Мысли</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Quotes['index']}>Мысли</Link>

        <Typography color="text.primary">Редактировать</Typography>
      </Breadcrumbs>

      {quote && <QuoteForm onSubmit={handleFormSubmit} quote={quote} />}
    </>
  );
}
