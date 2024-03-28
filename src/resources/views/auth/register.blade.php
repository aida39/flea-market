@extends('layouts.header')

@section('css')
@endsection

@section('content')
@if (session('result'))
<div class="flash-message">
    {{ session('result') }}
</div>
@endif
<div class="container">
    <h1 class="title">会員登録</h1>
    <form action="/register" method="post">
        @csrf
        <label class="form__label">メールアドレス</label>
        <input type="email" class="form__input" name="email" value="{{old('email')}}">

        <label class="form__label">パスワード</label>
        <input type="password" class="form__input" name="password">

        <button class="form__button" type="submit">登録する</button>
    </form>
    <a href="/login" class="form__link">ログインはこちら</a>
</div>
@endsection