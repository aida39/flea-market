@extends('layouts.header')

@section('css')
@endsection

@section('content')
<div class="form__container">
    <h1 class="page-title">プロフィール設定</h1>
    <form action="/mypage/profile" method="post" enctype="multipart/form-data">
        @csrf
        <div class="user-unit">
            <div id="imagePreview">
                <img class="user-image" src="{{ asset($profile['image_path'] ?? asset('images/user.jpg')) }}" alt="Current Image">
            </div>
            <input type="file" name="image" id="input-file-01" onchange="previewImage(event, 'user-image')">
            <div>
                <button id="bt-file-01" class="image-button" type="button">画像を選択する</button>
                <div class="error-message">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>
                <span id="output-01" class="output"></span>
            </div>
        </div>

        <div class="form__item--compact">
            <label class="form__label">ユーザー名</label>
            <input type="text" class="form__input" name="name" value="{{ old('name', $profile ? $profile['name'] : '') }}">
            <div class="error-message">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form__item--compact">
            <label class="form__label">郵便番号（ハイフン不要）</label>
            <input type="text" class="form__input" name="postal_code" value="{{old('postal_code', $profile ? $profile['postal_code'] : '') }}">
            <div class="error-message">
                @error('postal_code')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form__item--compact">
            <label class="form__label">住所</label>
            <input type="text" class="form__input" name="address" value="{{old('address', $profile ? $profile['address'] : '') }}">
            <div class="error-message">
                @error('address')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form__item--compact">
            <label class="form__label">建物名</label>
            <input type="text" class="form__input" name="building" value="{{old('building', $profile ? $profile['building'] : '') }}">
            <div class="error-message">
                @error('building')
                {{ $message }}
                @enderror
            </div>
        </div>

        <button class="form__button" type="submit">更新する</button>
    </form>
</div>
<script src="{{ asset('js/file-select.js') }}"></script>
<script src="{{ asset('js/image-preview.js') }}"></script>
@endsection