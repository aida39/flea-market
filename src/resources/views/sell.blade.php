@extends('layouts.header')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sell-page.css') }}" />
@endsection

@section('content')
    <div class="form__container">
        <h1 class="page-title">商品の出品</h1>
        <form action="/sell" method="post" enctype="multipart/form-data">
            @csrf
            <div class="sell__section-area">
                <label class="form__label">商品画像</label>
                <div class="sell__image-area">
                    <div id="imagePreview">
                    </div>
                    <input type="file" name="image" id="input-file-01"
                        onchange="previewImage(event, 'item-image--small')">
                    <button id="bt-file-01" class="image-button" type="button">画像を選択する</button>
                    <span id="output-01" class="output"></span>
                </div>
                <div class="error-message">
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="sell__section-area">
                <h2 class="sell__heading">商品の詳細</h2>
                <div class="form__item--compact">
                    <label class="form__label">カテゴリー</label>
                    <div onclick="showCheckboxes()">
                        <select name="category_id" class="form__select"></select>
                        <div id="checkbox">
                            @foreach ($categories as $category)
                                <label for="{{ $category['id'] }}">
                                    <input type="checkbox" name="category_id[]" id="{{ $category['id'] }}"
                                        value="{{ $category['id'] }}">{{ $category['name'] }}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="error-message">
                        @error('category_id')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__item--compact">
                    <label class="form__label">商品の状態</label>
                    <select name="condition_id" class="form__select">
                        @foreach ($conditions as $condition)
                            <option value="{{ $condition['id'] }}"
                                {{ old('condition_id') == $condition['id'] ? 'selected' : '' }}>{{ $condition['name'] }}
                            </option>
                        @endforeach
                    </select>
                    <div class="error-message">
                        @error('condition_id')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="sell__section-area">
                <h2 class="sell__heading">商品名と説明</h2>
                <div class="form__item--compact">
                    <label class="form__label">商品名</label>
                    <input type="text" class="form__input" name="name" value="{{ old('name') }}">
                    <div class="error-message">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__item--compact">
                    <label class="form__label">ブランド名</label>
                    <input type="text" class="form__input" name="brand" value="{{ old('brand') }}">
                    <div class="error-message">
                        @error('brand')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__item--compact">
                    <label class="form__label">商品の説明</label>
                    <textarea name="description" class="form__textarea">{{ old('description') }}</textarea>
                    <div class="error-message">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="sell__section-area">
                <h2 class="sell__heading">販売価格</h2>
                <div class="form__item--compact">
                    <label class="form__label">販売価格</label>
                    <div class="sell__price-unit">
                        <span class="sell__yen-symbol">¥</span>
                        <input type="text" class="form__input sell__price-input" name="price"
                            value="{{ old('price') }}">
                    </div>
                    <div class="error-message">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <button class="form__button" type="submit" onclick="confirmAction(event, '出品してよろしいですか？');">出品する</button>
        </form>
    </div>
    <script src="{{ asset('js/file-select.js') }}"></script>
    <script src="{{ asset('js/image-preview.js') }}"></script>
    <script src="{{ asset('js/show-checkbox.js') }}"></script>
    <script src="{{ asset('js/confirmation-window.js') }}"></script>
@endsection
