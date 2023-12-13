<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function login()
  {
    return view('auth.login');
  }

  public function check()
  {
    request()->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $user = User::where('email', '=', request('email'))->first();

    if (!$user) {
      return response([
        'errors' => [
          'email' => 'User not found',
        ],
      ], 400);
    }

    if (Hash::check(request('password'), $user->password)) {
      session()->put('user', $user);
      return $user;
    } else {
      return response([
        'errors' => [
          'password' => 'Invalid password',
        ],
      ], 400);
    }
  }

  public function logout()
  {
    if (session()->has('user')) {
      session()->pull('user');
    }

    return redirect(route('home'));
  }

  public function verify()
  {
    return view('auth.verify');
  }

  public function verification()
  {
    return redirect(route('home'));
  }
}
