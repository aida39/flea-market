<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        try {
            User::create([
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            return redirect('/login')->with('result', '会員登録が完了しました');
        } catch (\Throwable $exception) {
            return redirect('/register')->with('result', 'エラーが発生しました');
        }
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/');
        } else {
            return redirect('/login')->with('result', 'メールアドレスまたはパスワードが違います');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect("/");
    }
}
