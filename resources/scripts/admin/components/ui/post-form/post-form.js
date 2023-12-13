import { Box, Button, Grid, TextField } from '@mui/material';
import ImageField from './ImageField/ImageField';

export default function QuoteForm({ onSubmit, post }) {
  return (
    <Box
      component="form"
      onSubmit={onSubmit}
      encType='multipart/form-data'
      sx={{
        display: 'flex',
        flexDirection: 'column',
        gap: 2,
        padding: "32px 24px",
        backgroundColor: 'white',
        borderRadius: 1,
        marginTop: 1,
      }}
    >
      <Grid container spacing={2}>
        <Grid item xs={4}>
          <ImageField image={`/${post?.image}`} />
        </Grid>
        <Grid item xs={9}>
          <TextField
            name="title"
            label="Заголовок"
            type="text"
            defaultValue={post?.title}
            fullWidth
            required
          />
        </Grid>

        <Grid item xs={12}>
          <TextField
            name="alternative_text"
            label="Описание"
            type="text"
            defaultValue={post?.title}
            fullWidth
            multiline
          />
        </Grid>
      </Grid>

      <Grid item xs={12} display="flex" justifyContent="flex-end">
        <Button variant="contained" type="submit">Сохранить</Button>
      </Grid>
    </Box>
  );
}
