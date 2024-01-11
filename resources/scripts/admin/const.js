export const AppRoute = {
  Index: '/',
  Admin: '/admin',
  Quotes: {
    'index': '/admin/quotes',
    'create': '/admin/quotes/create',
    'edit': '/admin/quotes/:id/edit',
  },
  Tags: '/admin/tags',
  Posts: {
    'index': '/admin/posts',
    'create': '/admin/posts/create',
    'edit': '/admin/posts/:id/edit',
  },
  Logout: '/auth/logout',
};

export const ApiRoute = {
  Quotes: {
    'index': '/quote',
    'store': '/quote',
    'show': '/quote/:id',
    'update': '/quote/:id',
    'delete': '/quote/:id',
    'multidelete': '/quotes/delete',
  },
  Tags: {
    'index': '/tag',
    'store': '/tag',
    'show': '/tag/:id',
    'update': '/tag/:id',
    'delete': '/tag/:id',
    'hierarchy': '/hierarchy',
  },
  Posts: {
    'index': '/post',
    'store': '/post',
    'show': '/post/:id',
    'update': '/post/:id',
    'delete': '/post/:id',
    'multidelete': '/posts/delete',
  }
};

export const dataGridLocalText = {
  noRowsLabel: 'Нет рядов',
  noResultsOverlayLabel: 'Результатов не найдено.',

  toolbarDensity: 'Плотность',
  toolbarDensityLabel: 'Плотность',
  toolbarDensityCompact: 'Компакт',
  toolbarDensityStandard: 'Стандарт',
  toolbarDensityComfortable: 'Комфортный',

  toolbarColumns: 'Колонны',
  toolbarColumnsLabel: 'Выберите столбцы',

  toolbarFilters: 'Фильтры',
  toolbarFiltersLabel: 'Показать фильтры',
  toolbarFiltersTooltipHide: 'Скрыть фильтры',
  toolbarFiltersTooltipShow: 'Показать фильтры',
  toolbarFiltersTooltipActive: (count) =>
    count !== 1 ? `${count} активные фильтры` : `${count} активные фильтры`,

  toolbarQuickFilterPlaceholder: 'Поиск…',
  toolbarQuickFilterLabel: 'Поиск',
  toolbarQuickFilterDeleteIconLabel: 'Очистить',

  toolbarExport: 'Экспорт',
  toolbarExportLabel: 'Экспорт',
  toolbarExportCSV: 'Скачать как CSV',
  toolbarExportPrint: 'Распечатать',
  toolbarExportExcel: 'Скачать как Excel',

  columnsPanelTextFieldLabel: 'Найти столбец',
  columnsPanelTextFieldPlaceholder: 'Заголовок столбца',
  columnsPanelDragIconLabel: 'Переупорядочение столбца',
  columnsPanelShowAllButton: 'Показать все',
  columnsPanelHideAllButton: 'Скрыть все',

  filterPanelAddFilter: 'Добавить фильтер',
  filterPanelDeleteIconLabel: 'Удалить',
  filterPanelLogicOperator: 'Логические операторы',
  filterPanelOperator: 'Оператор',
  filterPanelOperatorAnd: 'И',
  filterPanelOperatorOr: 'Или',
  filterPanelColumns: 'Столбцы',
  filterPanelInputLabel: 'Значение',
  filterPanelInputPlaceholder: 'Значение фильтра',

  filterOperatorContains: 'содержит',
  filterOperatorEquals: 'равно',
  filterOperatorStartsWith: 'начинается с',
  filterOperatorEndsWith: 'заканчивается',
  filterOperatorIs: 'является',
  filterOperatorNot: 'не является',
  filterOperatorAfter: 'после',
  filterOperatorOnOrAfter: 'на или после',
  filterOperatorBefore: 'раньше',
  filterOperatorOnOrBefore: 'на или ранее',
  filterOperatorIsEmpty: 'пусто',
  filterOperatorIsNotEmpty: 'не пуст',
  filterOperatorIsAnyOf: 'любой',

  filterValueAny: 'любой',
  filterValueTrue: 'истинный',
  filterValueFalse: 'ложь',

  
  columnMenuLabel: 'Меню',
  columnMenuShowColumns: 'Показать столбцы',
  columnMenuManageColumns: 'Управление столбцами',
  columnMenuFilter: 'Фильтр',
  columnMenuHideColumn: 'Скрыть столбец',
  columnMenuUnsort: 'Убрать сортировку',
  columnMenuSortAsc: 'Сортировать, восходящая',
  columnMenuSortDesc: 'Сортировать, спустившись',

  columnHeaderFiltersTooltipActive: (count) =>
    count !== 1 ? `${count} активные фильтры` : `${count} активные фильтры`,
  columnHeaderFiltersLabel: 'Показать фильтры',
  columnHeaderSortIconLabel: 'Сортировать',

  footerRowSelected: (count) =>
    count !== 1
      ? `${count.toLocaleString()} ряды выбраны`
      : `${count.toLocaleString()} выбран строка`,

  footerTotalRows: 'Общие ряды:',

  footerTotalVisibleRows: (visibleCount, totalCount) =>
    `${visibleCount.toLocaleString()} из ${totalCount.toLocaleString()}`,

  checkboxSelectionHeaderName: 'Выбор флажки',
  checkboxSelectionSelectAllRows: 'Выберите все ряды',
  checkboxSelectionUnselectAllRows: 'Невыполнить все ряды',
  checkboxSelectionSelectRow: 'Выберите строку',
  checkboxSelectionUnselectRow: 'Невыразированный ряд',

  booleanCellTrueLabel: 'да',
  booleanCellFalseLabel: 'нет',

  actionsCellMore: 'ещё',

  pinToLeft: 'Булавка слева',
  pinToRight: 'Приколоть справа',
  unpin: 'Не',

  treeDataGroupingHeaderName: 'Группа',
  treeDataExpand: 'смотрите детей',
  treeDataCollapse: 'скрыть детей',

  groupingColumnHeaderName: 'Группа',
  groupColumn: (name) => `Группа по ${name}`,
  unGroupColumn: (name) => `Прекратите группировать ${name}`,

  detailPanelToggle: 'Подробная панель переключать',
  expandDetailPanel: 'Расширять',
  collapseDetailPanel: 'Крах',

  MuiTablePagination: {},

  rowReorderingHeaderName: 'Переупорядочение ряда',

  aggregationMenuItemHeader: 'Агрегация',
  aggregationFunctionLabelSum: 'сумма',
  aggregationFunctionLabelAvg: 'средний',
  aggregationFunctionLabelMin: 'мин',
  aggregationFunctionLabelMax: 'макс',
  aggregationFunctionLabelSize: 'размер',
};
