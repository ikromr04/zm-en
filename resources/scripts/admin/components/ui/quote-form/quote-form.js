import { Box, Button, Grid, TextField } from '@mui/material';
import { useEffect, useState } from 'react';
import OutlinedInput from '@mui/material/OutlinedInput';
import InputLabel from '@mui/material/InputLabel';
import MenuItem from '@mui/material/MenuItem';
import FormControl from '@mui/material/FormControl';
import Select from '@mui/material/Select';
import axios from 'axios';
import { ApiRoute } from '../../../const';
import Checkbox from '@mui/material/Checkbox';
import ListItemText from '@mui/material/ListItemText';

export default function QuoteForm({ onSubmit, quote }) {
  const [tags, setTags] = useState([]);
  const [selectedTags, setSelectedTags] = useState(quote ? quote.tags.map(({ id }) => id) : []);

  useEffect(() => {
    axios
      .get(ApiRoute.Tags['index'])
      .then(({ data }) => setTags(data))
      .catch((error) => console.log(error));
  }, []);

  const handleSelectChange = (evt) => {
    const tagID = evt.target.value;
    setSelectedTags(tagID);
  };

  return (
    <Box
      component="form"
      onSubmit={onSubmit}
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
        <Grid item xs={12}>
          <TextField
            name="quote"
            label="Мысль"
            type="text"
            defaultValue={quote?.quote}
            fullWidth
            multiline
            required
          />
        </Grid>
        <Grid item xs={6}>
          <TextField
            name="twitter"
            label="Твиттер"
            type="text"
            defaultValue={quote?.twitter}
            fullWidth
            multiline
          />
        </Grid>

        <Grid item xs={6}>
          <FormControl fullWidth>
            <InputLabel id="tags">Теги</InputLabel>
            <Select
              multiple
              labelId="tags"
              name="tags"
              onChange={handleSelectChange}
              input={<OutlinedInput label="Теги" />}
              value={selectedTags}
              renderValue={(selected) => selected?.map((id) => tags.find((tag) => tag.id === id)?.title).join(', ')}
            >
              {tags?.map((tag) => (
                <MenuItem
                  key={tag.id}
                  value={tag.id}
                >
                  <Checkbox checked={selectedTags.indexOf(tag.id) > -1} />
                  <ListItemText primary={tag?.title} />
                </MenuItem>
              ))}
            </Select>
          </FormControl>
        </Grid>
      </Grid>

      <Grid item xs={12} display="flex" justifyContent="flex-end">
        <Button variant="contained" type="submit">Сохранить</Button>
      </Grid>
    </Box>
  );
}
