<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quote;
use Illuminate\Support\Facades\DB;
use stdClass;

class AppController extends Controller
{
  public function index()
  {
    $data = new stdClass();
    $data->posts = Post::latest()->get();

    if (session('user')) {
      $data->quotes = Quote::latest()->paginate(10);

      foreach ($data->quotes as $key => $quote) {
        $data->quotes[$key]->favorite = DB::table('quote_user')
          ->where('quote_id', $quote->id)
          ->where('user_id', session('user')->id)
          ->first();
      }
    } else {
      $data->quotes = Quote::latest()->paginate(10);
    }

    return view('pages.index', compact('data'));
  }

  public function termsOfUse()
  {
    $data = new stdClass();
    $data->posts = Post::latest()->get();

    return view('pages.terms-of-use', compact('data'));
  }

  public function privacyPolicy()
  {
    $data = new stdClass();
    $data->posts = Post::latest()->get();

    return view('pages.privacy-policy', compact('data'));
  }
}
