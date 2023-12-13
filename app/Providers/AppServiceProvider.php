<?php

namespace App\Providers;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Schema::defaultStringLength(191);
    Paginator::useBootstrap();

    view()->composer('*', function ($view) {
      $folders = [];
      if (session('user')) {
        $folders = Favorite::where('user_id', session('user')->id)->defaultOrder()->get()->toTree();
        session()->put('folders', $folders);
      }

      return $view->with([
        'folders' => $folders,
      ]);
    });
  }
}
