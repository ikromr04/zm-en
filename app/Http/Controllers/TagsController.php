<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quote;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class TagsController extends Controller
{
  public function index()
  {
    $data = new stdClass();
    $data->posts = Post::latest()->get();
    $data->tags = Tag::defaultOrder()->get()->toTree();

    return view('pages.tags.index', compact('data'));
  }

  public function selected($slug)
  {
    $data = new stdClass();
    $data->tags = Tag::defaultOrder()->get()->toTree();
    $data->selectedTag = Tag::where('slug', $slug)->first();
    $tagId = [$data->selectedTag->id];
    $data->quotes = Quote::whereHas('tags', function ($q) use ($tagId) {
      $q->whereIn('id', $tagId);
    })->paginate(10);

    if (session('user')) {
      foreach ($data->quotes as $key => $quote) {
        $data->quotes[$key]->favorite = DB::table('quote_user')
          ->where('quote_id', $quote->id)
          ->where('user_id', session('user')->id)
          ->first();
      }
    }

    return view('pages.tags.selected', compact('data'));
  }

  public function get()
  {
    try {
      return Tag::defaultOrder()->get()->toTree();
    } catch (\Throwable $th) {
      return response([
        'message' => 'Не удалось найти данные',
        'error' => $th,
      ]);
    }
  }

  public function hierarchy(Request $request)
  {
    try {
      Tag::rebuildTree($request->hierarchy, true);

      return response(['message' => 'Данные успешно сохранены'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
