@extends('layouts.header')

@section('css')
@endsection

@section('content')
    @if (session('result'))
        <div class="flash-message">
            {{ session('result') }}
        </div>
    @endif
    <div class="form__container">
        <h1 class="page-title">会員登録</h1>
        <form action="/register" method="post">
            @csrf
            <div class="form__item">
                <label class="form__label">メールアドレス</label>
                <input type="email" class="form__input" name="email" value="{{ old('email') }}">
                <div class="error-message">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form__item">
                <label class="form__label">パスワード</label>
                <input type="password" class="form__input" name="password">
                <div class="error-message">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <button class="form__button" type="submit">登録する</button>
        </form>
        <a href="/login" class="form__link">ログインはこちら</a>
    </div>
@endsection
