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
    <h1 class="page-title">ログイン</h1>
    <form action="/login" method="post">
        @csrf
        <label class="form__label">メールアドレス</label>
        <input type="email" class="form__input" name="email" value="{{old('email')}}">

        <label class="form__label">パスワード</label>
        <input type="password" class="form__input" name="password">

        <button class="form__button" type="submit">ログインする</button>
    </form>
    <a href="/register" class="form__link">会員登録はこちら</a>
</div>
@endsection