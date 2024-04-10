@extends('layouts.header')

@section('css')
@endsection

@section('content')
<div class="form__container">
    <h1 class="page-title">配送先の変更</h1>
    <form action="/purchase/address/{{$id}}" method="post">
        @csrf
        <div class="form__item">
            <label class="form__label">郵便番号（ハイフン不要）</label>
            <input type="text" class="form__input" name="postal_code" value="{{old('postal_code', $shipping_address ? $shipping_address['postal_code'] : '') }}">
            <div class="error-message">
                @error('postal_code')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form__item">
            <label class="form__label">住所</label>
            <input type="text" class="form__input" name="address" value="{{old('address', $shipping_address ? $shipping_address['address'] : '') }}">
            <div class="error-message">
                @error('address')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form__item">
            <label class="form__label">建物名</label>
            <input type="text" class="form__input" name="building" value="{{old('building', $shipping_address ? $shipping_address['building'] : '') }}">
            <div class="error-message">
                @error('building')
                {{ $message }}
                @enderror
            </div>
        </div>

        <button class="form__button" type="submit">更新する</button>
    </form>
</div>
@endsection