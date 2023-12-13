import { DataGrid } from '@mui/x-data-grid';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { dataGridLocalText } from '../../const';
import { Button, IconButton } from '@mui/material';
import { generatePath } from 'react-router-dom';
import { Stack } from '@mui/system';
import { toast } from 'react-toastify';
import { ApiRoute, AppRoute } from '../../const';
import EditIcon from '@mui/icons-material/Edit';
import DeleteIcon from '@mui/icons-material/Delete';
import dayjs from 'dayjs';
import * as XLSX from 'xlsx/xlsx.mjs';

export default function QuotesBoard() {
  const [rows, setRows] = useState([]);
  const [selection, setSelection] = useState([]);

  useEffect(() => {
    axios
      .get(ApiRoute.Quotes['index'])
      .then(({ data }) => setRows(data.map(({ id, quote, slug, created_at, tags }) => ({
        id,
        created_at: dayjs(created_at).format('YYYY-MM-DD HH:mm'),
        quote,
        tags: tags.map(({ title }) => title).join(', '),
        slug: `#${slug?.padStart(4, '0')}`,
      }))))
      .catch(({ response }) => toast.error(response.data.message));
  }, []);

  const handleDeleteClick = (id) => () => {
    window.confirm(`Вы уверены что хотите безвозвратно удалить?`) &&
      axios
        .delete(generatePath(ApiRoute.Quotes['delete'], { id }))
        .then(() => setRows([...rows.filter((row) => row.id !== id)]))
        .catch(({ response }) => toast.error(response.data.message));
  };

  const handleDeleteSelectedButtonClick = () => {
    window.confirm(
      `Вы уверены что хотите безвозвратно удалить выбранные?
      \nВыбрано ${selection.length}`
    ) &&
      axios
        .post(ApiRoute.Quotes['multidelete'], { ids: selection })
        .then(() => setRows([...rows.filter((row) => !selection.includes(row.id))]))
        .catch(({ response }) => toast.error(response.data.message));
  };

  const handleOnExport = () => {
    const sheetData = rows.map((quote) => ({
      'Мысли': quote.quote,
      'Теги': quote.tags,
    }));
    const wb = XLSX.utils.book_new();
    const ws = XLSX.utils.json_to_sheet(sheetData);
    XLSX.utils.book_append_sheet(wb, ws, 'sheet1');
    XLSX.writeFile(wb, "QuotesExcel.xlsx");
  };

  const columns = [
    { field: 'id', headerName: 'ID', width: 72 },
    { field: 'created_at', headerName: 'Дата', width: 140 },
    { field: 'quote', headerName: 'Мысль', width: 400 },
    { field: 'tags', headerName: 'Теги', width: 300 },
    {
      field: 'slug',
      headerName: 'Слаг',
      width: 100,
      headerAlign: 'center',
      align: 'center',
    },
    {
      field: 'actions',
      headerName: 'Действия',
      width: 120,
      headerAlign: 'center',
      align: 'center',
      renderCell: (params) => (
        <Stack spacing={1} direction="row">
          <IconButton
            sx={{
              backgroundColor: 'rgba(237, 108, 2, 0.2)',
              border: '1px solid rgba(237, 108, 2, 0.4)',
            }}
            size="small"
            href={generatePath(AppRoute.Quotes['edit'], { id: params.row.id })}
            color="warning"
            title="Редактировать"
          >
            <EditIcon />
          </IconButton>
          <IconButton
            sx={{
              backgroundColor: 'rgba(211, 47, 47, 0.2)',
              border: '1px solid rgba(211, 47, 47, 0.4)',
            }}
            size="small"
            color="error"
            title="Удалить"
            onClick={handleDeleteClick(params.row.id)}
          >
            <DeleteIcon />
          </IconButton>
        </Stack>
      ),
    },
  ];

  return (
    <>
      <Stack direction="row" justifyContent="right" marginBottom={1} spacing={1}>
        <Button
          variant="contained"
          onClick={handleOnExport}
        >
          Экспорт в excel
        </Button>
        <Button
          variant="contained"
          color="error"
          disabled={!selection.length}
          onClick={handleDeleteSelectedButtonClick}
        >
          Удалить выбранные ({selection.length})
        </Button>
        <Button
          variant="contained"
          color="success"
          href={AppRoute.Quotes['create']}
        >
          Добавить новый
        </Button>
      </Stack>

      <DataGrid
        sx={{ backgroundColor: 'white' }}
        rows={rows}
        columns={columns}
        pageSize={20}
        rowsPerPageOptions={[20]}
        getRowHeight={() => 'auto'}
        checkboxSelection
        disableSelectionOnClick
        onSelectionModelChange={(newSelectionModel) => setSelection(newSelectionModel)}
        localeText={dataGridLocalText}
        autoHeight
      />
    </>
  );
}
