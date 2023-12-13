import './App.css';
import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom';
import { AppRoute } from '../../const';
import PageWrapper from '../layouts/page-wrapper';
import QuotesIndex from '../pages/quotes';
import QuotesCreate from '../pages/quotes/create';
import QuotesEdit from '../pages/quotes/edit';
import TagsPage from '../pages/tags-page/tags-page';
import PostsIndex from '../pages/posts';
import PostsCreate from '../pages/posts/create';
import PostsEdit from '../pages/posts/edit';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path={AppRoute.Index} element={<PageWrapper />}>
          <Route path={AppRoute.Admin} element={<Navigate to={AppRoute.Quotes['index']} />} />

          <Route path={AppRoute.Quotes['index']} element={<QuotesIndex />} />
          <Route path={AppRoute.Quotes['create']} element={<QuotesCreate />} />
          <Route path={AppRoute.Quotes['edit']} element={<QuotesEdit />} />

          <Route path={AppRoute.Tags} element={<TagsPage />} />

          <Route path={AppRoute.Posts['index']} element={<PostsIndex />} />
          <Route path={AppRoute.Posts['create']} element={<PostsCreate />} />
          <Route path={AppRoute.Posts['edit']} element={<PostsEdit />} />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
