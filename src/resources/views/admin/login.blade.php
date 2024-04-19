@extends('layouts.header_admin')

@section('css')
@endsection

@section('content')
    @if (session('result'))
        <div class="flash-message">
            {{ session('result') }}
        </div>
    @endif
    <div class="form__container">
        <h1 class="page-title">ログイン</h1>
        <form action="/admin/login" method="post">
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

            <button class="form__button" type="submit">ログインする</button>
        </form>
    </div>
@endsection
