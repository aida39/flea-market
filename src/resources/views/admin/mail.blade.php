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
        <h1 class="page-title">メール送信</h1>
        <form action="/admin/mail" method="post">
            @csrf
            <div class="form__item">
                <label class="form__label">タイトル</label>
                <input name="mail_subject" type="text" class="form__input" value="{{ old('mail_subject') }}"></input>
                <div class="error-message">
                    @error('mail_subject')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__item">
                <label class="form__label">本文</label>
                <textarea name="mail_message" class="form__textarea">{{ old('mail_message') }}</textarea>
                <div class="error-message">
                    @error('mail_message')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <button class="form__button" type="submit" onclick="confirmAction(event, 'このメールを送信しますか？');">メールを送信する</button>
        </form>
    </div>
    <script src="{{ asset('js/confirmation-window.js') }}"></script>
@endsection
