<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/verify', [AuthController::class, 'verify'])->name('auth.verify');
Route::get('/auth/verify/{id}/{hash}', [UserController::class, 'verifyEmail'])->name('auth.verifyEmail');

// Route::group(['middleware' => ['VerifyEmail']], function() {
  Route::get('/users/verify/{id}/{hash}/{email}', [UserController::class, 'verifyUsersEmail'])->name('users.verifyEmail');
  Route::get('/', [AppController::class, 'index'])->name('home');
  Route::get('/thoughts/search', [QuotesController::class, 'search'])->name('quotes.search');
  Route::get('/thoughts/{slug}', [QuotesController::class, 'selected'])->name('quotes.selected');
  Route::get('/tags', [TagsController::class, 'index'])->name('tags');
  Route::get('/tags/{slug}', [TagsController::class, 'selected'])->name('tags.selected');
  Route::get('/author', [AuthorController::class, 'index'])->name('author');
  Route::post('/users/register', [UserController::class, 'register']);
  Route::post('/users/forgot-password', [UserController::class, 'forgotPassword']);
  Route::get('/users/reset-password/{token}', [UserController::class, 'resetPassword'])->name('users.resetPassword');
  Route::post('/users/reset-password', [UserController::class, 'resetPasswordSubmit']);

  Route::group(['middleware' => ['AuthCheck']], function () {
    Route::post('/auth/verify', [AuthController::class, 'verification'])->name('auth.verification');
    Route::post('/auth/{id}', [AuthController::class, 'delete'])->name('auth.delete');

    Route::post('/users/{userId}/avatar', [UserController::class, 'updateAvatar']);
    Route::get('/users/{userId}/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::post('/users/{userId}/update', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/{userId}/update-password', [UserController::class, 'updatePassword'])->name('users.updatePassword');

    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    Route::post('/favorites/modal', [FavoriteController::class, 'modal'])->name('favorites.modal');
    Route::post('/favorites', [FavoriteController::class, 'add']);
    Route::post('/favorites/create', [FavoriteController::class, 'create']);
    Route::post('/favorites/update', [FavoriteController::class, 'update']);
    Route::delete('/favorites/{favoriteId}', [FavoriteController::class, 'delete']);
    Route::get('/favorites/{favoriteId?}', [FavoriteController::class, 'show'])->name('favorites.show');
    Route::delete('/favorites/quotes/{quoteId}', [FavoriteController::class, 'remove']);
  });
// });
Route::post('/users/verify/resend', [UserController::class, 'resendEmailVerification'])->name('user.verification.resend');

Route::group(['middleware' => ['AdminCheck']], function () {
  Route::view('/admin/{path?}', 'admin')->where('path', '.*');

  Route::get('/quote', [QuotesController::class, 'index']);
  Route::post('/quote', [QuotesController::class, 'store']);
  Route::get('/quote/{id}', [QuotesController::class, 'show']);
  Route::post('/quote/{id}', [QuotesController::class, 'update']);
  Route::delete('/quote/{id}', [QuotesController::class, 'destroy']);
  Route::post('/quotes/delete', [QuotesController::class, 'multidelete']);

  Route::get('/tag', [TagsController::class, 'get']);
  Route::post('/tag', [TagsController::class, 'store']);
  Route::get('/tag/{id}', [TagsController::class, 'show']);
  Route::post('/tag/{id}', [TagsController::class, 'update']);
  Route::delete('/tag/{tag}', [TagsController::class, 'destroy']);
  Route::post('/hierarchy', [TagsController::class, 'hierarchy']);

  Route::get('/post', [PostsController::class, 'index']);
  Route::post('/post', [PostsController::class, 'store']);
  Route::get('/post/{id}', [PostsController::class, 'show']);
  Route::post('/post/{id}', [PostsController::class, 'update']);
  Route::delete('/post/{id}', [PostsController::class, 'destroy']);
  Route::post('/posts/delete', [PostsController::class, 'multidelete']);
});
