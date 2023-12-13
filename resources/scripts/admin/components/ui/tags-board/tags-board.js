import axios from 'axios';
import { useEffect, useState } from 'react';
import { toast } from 'react-toastify';
import { ApiRoute } from '../../../const';
import { Button, IconButton, Stack } from '@mui/material';
import { useNestedSet } from '../../../hooks/use-nested-set';
import EditIcon from '@mui/icons-material/Edit';
import DeleteIcon from '@mui/icons-material/Delete';

export default function TagsBoard() {
  const [tags, setTags] = useState(null);
  const [changed, setChanged] = useState(false);
  const ref = useNestedSet(() => setChanged(true));

  useEffect(() => {
    !tags && axios
      .get(ApiRoute.Tags['index'])
      .then(({ data }) => {
        setTags(data);
      })
      .catch(({ response }) => toast.error(response.data.message));
  }, [tags]);

  const handleSaveButtonClick = () => {
    const hierarchy = [];

    document.querySelectorAll('.nested-list>li')?.forEach((item) => {
      const category = JSON.parse(item.dataset.item);

      item.querySelectorAll('li')?.forEach((child, index) => {
        const categoryChild = JSON.parse(child.dataset.item);
        if (index === 0) {
          category.children = [categoryChild];
        } else {
          category.children.push(categoryChild);
        }
      });

      hierarchy.push(category);
    });
    axios
      .post(ApiRoute.Tags['hierarchy'], { hierarchy })
      .then(({ data }) => {
        toast.success(data.message)
      })
      .catch(({ response }) => toast.error(response.data.message));
  };

  const handleCancelButtonClick = () => {
    setChanged(false);
    window.location.reload();
  }

  const handleEditButtonClick = (evt) => {
    const item = evt.target.closest('li');
    const input = item.querySelector('input');
    input.readOnly = false;
    input.focus();
  };

  const handleInputChange = (evt) => {
    const item = evt.target.closest('li');
    const node = JSON.parse(item.dataset.item);
    node.title = evt.target.value;
    item.dataset.item = JSON.stringify(node);
    setChanged(true);
  };

  const handleDeleteButtonClick = (evt) => {
    evt.target.closest('li').remove();
    setChanged(true);
  };

  const handleAddButtonClick = () => {
    setTags([{ title: 'Введите название нового тега' }, ...tags]);
    setChanged(true);
  };

  return (
    <>
      <Stack direction="row" justifyContent="right" marginBottom={1} spacing={1}>
        <Button
          variant="contained"
          color="success"
          disabled={!changed}
          onClick={handleSaveButtonClick}
        >
          Сохранить
        </Button>
        <Button
          variant="contained"
          color="error"
          disabled={!changed}
          onClick={handleCancelButtonClick}
        >
          Отмена
        </Button>
        <Button
          variant="contained"
          onClick={handleAddButtonClick}
        >
          Добавить
        </Button>
      </Stack>

      <ol ref={ref} className="nested-list">
        {tags?.map(({ id, title, children}) => (
          <li
            key={id}
            className="nested-list__item"
            data-item={JSON.stringify({ id, title })}
          >
            <div className="nested-list__draggable">
              <input
                className="nested-list__title"
                defaultValue={title}
                readOnly={!id ? false : true}
                onBlur={(evt) => (evt.target.readOnly = true)}
                onChange={handleInputChange}
                autoFocus={!id ? true : false }
              />
              <Stack spacing={1} direction="row" marginLeft={4}>
                <IconButton
                  sx={{
                    backgroundColor: 'rgba(237, 108, 2, 0.2)',
                    border: '1px solid rgba(237, 108, 2, 0.4)',
                  }}
                  size="small"
                  color="warning"
                  title="Редактировать"
                  onClick={handleEditButtonClick}
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
                  onClick={handleDeleteButtonClick}
                >
                  <DeleteIcon />
                </IconButton>
              </Stack>
            </div>

            {children?.length ?
              <ol>
                {children.map(({ id, title }) => (
                  <li
                    key={id}
                    className="nested-list__item"
                    data-item={JSON.stringify({ id, title })}
                  >
                    <div className="nested-list__draggable">
                      <input
                        className="nested-list__title"
                        defaultValue={title}
                        readOnly
                        onBlur={(evt) => (evt.target.readOnly = true)}
                        onChange={handleInputChange}
                      />
                      <Stack spacing={1} direction="row" marginLeft="auto">
                        <IconButton
                          sx={{
                            backgroundColor: 'rgba(237, 108, 2, 0.2)',
                            border: '1px solid rgba(237, 108, 2, 0.4)',
                          }}
                          size="small"
                          color="warning"
                          title="Редактировать"
                          onClick={handleEditButtonClick}
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
                          onClick={handleDeleteButtonClick}
                        >
                          <DeleteIcon />
                        </IconButton>
                      </Stack>
                    </div>
                  </li>
                ))}
              </ol> : ''
            }
          </li>
        ))}
      </ol>
    </>
  );
}
