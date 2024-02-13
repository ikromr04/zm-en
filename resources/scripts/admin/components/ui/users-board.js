import { DataGrid } from '@mui/x-data-grid';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { dataGridLocalText } from '../../const';
import { Button, IconButton } from '@mui/material';
import { generatePath } from 'react-router-dom';
import { Stack } from '@mui/system';
import { toast } from 'react-toastify';
import { ApiRoute, AppRoute } from '../../const';
import DeleteIcon from '@mui/icons-material/Delete';
import * as XLSX from 'xlsx/xlsx.mjs';

export default function UsersBoard() {
  const [rows, setRows] = useState([]);
  const [selection, setSelection] = useState([]);

  useEffect(() => {
    axios
      .get(ApiRoute.Users['index'])
      .then(({ data }) => setRows(data.map(({ id, name, email, email_verified_at, avatar }) => ({
        id, name, email, email_verified_at, avatar,
      }))))
      .catch(({ response }) => toast.error(response.data.message));
  }, []);

  const handleDeleteClick = (id) => () => {
    window.confirm(`Вы уверены что хотите безвозвратно удалить?`) &&
      axios
        .delete(generatePath(ApiRoute.Users['delete'], { id }))
        .then(() => setRows([...rows.filter((row) => row.id !== id)]))
        .catch(({ response }) => toast.error(response.data.message));
  };

  const handleDeleteSelectedButtonClick = () => {
    window.confirm(
      `Вы уверены что хотите безвозвратно удалить выбранные?
      \nВыбрано ${selection.length}`
    ) &&
      axios
        .post(ApiRoute.Users['multidelete'], { ids: selection })
        .then(() => setRows([...rows.filter((row) => !selection.includes(row.id))]))
        .catch(({ response }) => toast.error(response.data.message));
  };

  const handleOnExport = () => {
    const sheetData = rows.map((user) => ({
      'Имя': user.name,
      'Эл. почта': user.email,
    }));
    const wb = XLSX.utils.book_new();
    const ws = XLSX.utils.json_to_sheet(sheetData);
    XLSX.utils.book_append_sheet(wb, ws, 'sheet1');
    XLSX.writeFile(wb, "zmquotes_users.xlsx");
  };

  const columns = [
    { field: 'id', headerName: 'ID', width: 72 },
    {
      field: 'avatar',
      headerName: 'Аватар',
      width: 140,
      renderCell: (params) => (
        <img
          style={{
            display: 'block',
            objectFit: 'cover',
            borderRadius: '50%',
            margin: '8px'
           }}
          src={`/${params.row.avatar}`}
          width={80}
          height={80}
          onError={({ currentTarget }) => {
            currentTarget.onerror = null;
            currentTarget.src="/images/default-avatar.png";
          }}
        />
      )
    },
    { field: 'name', headerName: 'Имя', width: 240 },
    { field: 'email', headerName: 'Эл. почта', width: 240 },
    { field: 'email_verified_at', headerName: 'Дата подтверждения почты', width: 300 },
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
