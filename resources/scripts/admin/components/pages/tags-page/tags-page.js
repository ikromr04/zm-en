import { Breadcrumbs, Link, Typography } from '@mui/material';
import React from 'react'
import { AppRoute } from '../../../const';
import TagsBoard from '../../ui/tags-board/tags-board';

function TagsPage() {
  return (
    <>
      <Typography component="h1" variant="h4">Теги</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit">Админ панель</Link>

        <Typography color="text.primary">Теги</Typography>
      </Breadcrumbs>

      <TagsBoard />
    </>
  );
}

export default TagsPage;
