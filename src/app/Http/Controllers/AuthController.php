<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function getRegister()
    {
        return view('auth/register');
    }

    public function postRegister(Request $request)
    {
        try {
            User::create([
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            return redirect('/login')->with('result', '会員登録が完了しました');
        } catch (\Throwable $exception) {
            return redirect('/register')->with('result', '登録中にエラーが発生しました');
        }
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth/login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect("/");
    }
}