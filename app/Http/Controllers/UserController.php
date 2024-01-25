<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use stdClass;

class UserController extends Controller
{
  public function register(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|string|min:8|required_with:confirm_password|same:confirm_password',
      'confirm_password' => 'required|string|min:8|required_with:password|same:password',
    ]);

    $user = User::create([
      'name' => request('name'),
      'email' => request('email'),
      'password' => bcrypt(request('password')),
    ]);

    $token = Str::random(64);

    // DB::table('verify_email')->insert([
    //   'token' => $token,
    //   'user_id' => $user->id,
    // ]);

    // Mail::send('emails.verify-email', [
    //   'token' => $token,
    //   'user' => $user,
    //   'password' => $request->password,
    // ], function ($message) use ($request) {
    //   $message->to($request->email);
    //   $message->subject('Welcome to the site zmquotes.com!');
    // });

    session()->put('user', $user);

    return $user;
  }

  public function verifyEmail($id, $hash)
  {
    $verifyEmail = DB::table('verify_email')->where(['token' => $hash]);

    if ($verifyEmail) {
      $verifyEmail->delete();

      $user = User::find($id);
      $user->email_verified_at = now();
      $user->update();

      session()->put('user', $user);
    }

    return redirect(route('home'));
  }

  public function verifyUsersEmail($id, $hash, $email)
  {
    $verifyEmail = DB::table('verify_email')->where(['token' => $hash]);

    if ($verifyEmail) {
      $verifyEmail->delete();

      $user = User::find($id);
      $user->email = $email;
      $user->update();

      session()->put('user', $user);
    }

    return redirect(route('users.profile', $id));
  }

  public function resendEmailVerification()
  {
    $user = session('user');
    $verifyEmail = DB::table('verify_email')->where(['user_id' => $user->id]);
    $token = Str::random(64);
    if ($verifyEmail) {
      $verifyEmail->delete();
    }
    DB::table('verify_email')->insert([
      'token' => $token,
      'user_id' => $user->id,
    ]);

    Mail::send('emails.verify-email', [
      'token' => $token,
      'user' => $user,
      'password' => '',
    ], function ($message) use ($user) {
      $message->to($user->email);
      $message->subject('Welcome to the site zmquotes.com!');
    });

    return back();
  }

  public function updateAvatar($userId)
  {
    $user = User::find($userId);

    if ($user->avatar && file_exists(public_path($user->avatar))) {
      unlink(public_path($user->avatar));
    }

    $file = request()->file('avatar');
    $fileName = uniqid() . '.' . $file->extension();
    $file->move(public_path('images/users'), $fileName);

    $user->avatar = '/images/users/' . $fileName;
    $user->update();

    session()->put('user', $user);

    return $user->avatar;
  }

  public function forgotPassword(Request $request)
  {
    if (!request('email')) {
      return response(['email' => 'Email is required'], 400);
    }
    $user = User::where('email', request('email'))->first();

    if (!$user) {
      return response(['email' => 'Invalid email'], 400);
    }

    $token = Str::random(64);

    DB::table('password_resets')->insert([
      'email' => request('email'),
      'token' => $token,
      'created_at' => Carbon::now()
    ]);

    Mail::send('emails.forgot', ['token' => $token], function ($message) use ($request) {
      $message->to($request->email);
      $message->subject('Password reset');
    });

    return response(['message' => 'We\'ve emailed you a reset link!'], 200);
  }

  public function resetPassword($token)
  {
    return view('pages.reset-password', ['token' => $token]);
  }

  public function resetPasswordSubmit(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|string|min:8|required_with:confirm_password|same:confirm_password',
      'confirm_password' => 'required|string|min:8|required_with:password|same:password',
    ]);

    $user = User::where('email', '=', $request->email)->first();

    if (!$user) {
      return response(['email' => 'User not found'], 400);
    }

    $updatePassword = DB::table('password_resets')
      ->where([
        'email' => $request->email,
        'token' => $request->token
      ])
      ->first();

    if (!$updatePassword) {
      return response(['message' => 'Invalid token!'], 400);
    }

    User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email' => $request->email])->delete();

    $user = User::where('email', $request->email)->first();

    session()->put('user', $user);

    return redirect(route('home'));
  }

  public function profile($userId)
  {
    $data = new stdClass();
    $data->posts = Post::get();
    $data->user = User::find($userId);

    return view('pages.users.profile', compact('data'));
  }

  public function update($userId)
  {
    request()->validate([
      'name' => 'required',
    ]);

    $user = User::find($userId);

    if (request('email') != $user->email) {
      request()->validate([
        'email' => 'required|email|unique:users,email',
      ]);

      $user->email = request('email');
      $user->update();

      session()->put('user', $user);

      // $token = Str::random(64);

      // DB::table('verify_email')->insert([
      //   'token' => $token,
      //   'user_id' => $user->id,
      // ]);
      // $email = request('email');
      // $user->email = $email;
      // $user->update = 'update';
      // Mail::send('emails.verify-email', [
      //   'token' => $token,
      //   'user' => $user,
      //   'password' => '',
      // ], function ($message) use ($email) {
      //   $message->to($email);
      //   $message->subject('Welcome to the site zmquotes.com!');
      // });

      return redirect()->back();
    }

    $user->name = request('name');
    $user->email = request('email');
    $user->update();

    session()->put('user', $user);

    return redirect(route('users.profile', $userId));
  }

  public function updatePassword($userId)
  {
    request()->validate([
      'password' => 'required',
      'new_password' => 'required|string|min:8|required_with:password_confirm|same:password_confirm',
      'password_confirm' => 'required|string|min:8|required_with:new_password|same:new_password'
    ]);

    $user = User::find($userId);

    if (!Hash::check(request('password'), $user->password)) {
      return back()->withErrors(['password' => ['Invalid password']]);
    }

    $user->password = bcrypt(request('new_password'));
    $user->update();

    return redirect(route('users.profile', $userId))->with('message', 'Password updated');
  }

  public function favoritesShow($userId, $favoriteId)
  {
    $data = new stdClass();
    $data->posts = Post::get();

    if ($favoriteId == 'all') {
      $data->quotes = User::find($userId)->quotes()->paginate(10);

      return view('pages.users.favorites-show', compact('data'));
    }

    $data->favorites = Favorite::where('user_id', $userId)->get();

    return view('pages.users.favorites', compact('data'));
  }
}
