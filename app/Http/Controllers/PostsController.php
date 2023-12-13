<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PostsController extends Controller
{
  public function index()
  {
    try {
      return Post::latest()->get();
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function store(Request $request)
  {
    try {
      $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

      $file = $request->file('image');
      $extension = $file->extension();
      $fileName = $slug . '.' . $extension;
      $file->move(public_path('/images/posts/'), $fileName);

      Post::create([
        'title' => $request->title,
        'slug' => $slug,
        'image' => 'images/posts/' . $fileName,
        'thumb_image' => 'images/posts/' . $fileName,
        'alternative_text' => $request->alternative_text,
      ]);

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function show($id)
  {
    try {
      return Post::find($id);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $post = Post::find($id);
      $post->title = $request->title;
      $post->alternative_text = $request->alternative_text;

      if ($request->has('image')) {
        file_exists(public_path($post->image))
          && unlink(public_path($post->image));

        $file = $request->file('image');
        $extension = $file->extension();
        $fileName = $post->slug . '.' . $extension;
        $file->move(public_path('images/posts/'), $fileName);

        $post->image = 'images/posts/' . $fileName;
        $post->thumb_image = 'images/posts/' . $fileName;
      }

      $post->update();

      return Post::find($id);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function destroy($id)
  {
    try {
      $post = Post::find($id);

      file_exists(public_path($post->image))
        && unlink(public_path($post->image));

      $post->delete();

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function multidelete(Request $request)
  {
    try {
      foreach ((array) request('ids') as $id) {
        $post = Post::find($id);

        file_exists(public_path($post->image))
        && unlink(public_path($post->image));

        $post->delete();
      }

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
