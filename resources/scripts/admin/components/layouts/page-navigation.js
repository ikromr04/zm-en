import { Box, List, ListItemButton, ListItemText } from '@mui/material';
import { AppRoute } from '../../const';
import { useLocation } from 'react-router-dom';

function PageNavigation() {
  const location = useLocation();

  return (
    <Box sx={{
      borderRight: '1px solid rgba(0, 0, 0, 0.12)',
      backgroundColor: 'white',
      minWidth: '220px'
    }}>
      <List component="nav">
        <ListItemButton href={AppRoute.Index}>
          <ListItemText primary="Вернуться на сайт" />
        </ListItemButton>

        <ListItemButton href={AppRoute.Quotes['index']} selected={location.pathname.startsWith(AppRoute.Quotes['index'])}>
          <ListItemText primary="Мысли" />
        </ListItemButton>

        <ListItemButton href={AppRoute.Tags} selected={location.pathname.startsWith(AppRoute.Tags)}>
          <ListItemText primary="Теги" />
        </ListItemButton>

        <ListItemButton href={AppRoute.Posts['index']} selected={location.pathname.startsWith(AppRoute.Posts['index'])}>
          <ListItemText primary="Картинки" />
        </ListItemButton>

        <ListItemButton href={AppRoute.Users['index']} selected={location.pathname.startsWith(AppRoute.Users['index'])}>
          <ListItemText primary="Пользователи" />
        </ListItemButton>

        <ListItemButton href={AppRoute.Logout}>
          <ListItemText primary="Выйти" />
        </ListItemButton>
      </List>
    </Box>
  );
}

export default PageNavigation;
