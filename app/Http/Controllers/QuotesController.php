<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class QuotesController extends Controller
{
  public function selected($slug)
  {
    $data = new stdClass();
    $data->quote = Quote::where('slug', $slug)->first();
    $data->tags = Tag::defaultOrder()->get()->toTree();

    if (session('user')) {
      $data->quote->favorite = DB::table('quote_user')
        ->where('quote_id', $data->quote->id)
        ->where('user_id', session('user')->id)
        ->first();
    }

    return view('pages.quotes.selected', compact('data'));
  }

  public function search(Request $request)
  {
    $data = new stdClass();
    $data->quotes = Quote::where('quote', 'like', '%' . $request->keyword . '%')->get();

    return view('components.search-modal-results', compact('data'))->render();
  }

  public function index()
  {
    try {
      return Quote::with('tags')->latest()->get();
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function store(Request $request)
  {
    try {
      $quote = Quote::where('quote', $request->quote)->first();
      if ($quote) {
        return response(['message' => 'Мысль существует'], 400);
      }

      $quote = Quote::create([
        'quote' => $request->quote,
        'twitter' => $request->twitter,
      ]);

      $quote->slug = $quote->id;
      $quote->update();

      if ($request->tags) {
        $quote->tags()->sync((array)$request->tags);
      }

      return response(['message' => 'Данные успешно сохранены'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function show($id)
  {
    try {
      return Quote::with('tags')->find($id);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $quote = Quote::find($id);
      $quote->quote = $request->quote;
      $quote->twitter = $request->twitter;
      $quote->slug = $request->slug;
      $quote->update();

      $quote->tags()->sync((array)$request->tags);

      return Quote::with('tags')->find($id);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function destroy($id)
  {
    try {
      Quote::find($id)->delete();
      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function multidelete(Request $request)
  {
    try {
      foreach ((array) request('ids') as $id) {
        Quote::find($id)->delete();
      }

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
