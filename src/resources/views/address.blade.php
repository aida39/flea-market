@extends('layouts.header')

@section('css')
@endsection

@section('content')
<div class="form-container">
    <h1 class="page-title">配送先の変更</h1>
    <form action="/purchase/address/{{$item['id']}}" method="post">
        @csrf
        <label class="form__label">郵便番号</label>
        <input type="text" class="form__input" name="postal_code" value="{{old('postal_code', $profile ? $profile['postal_code'] : '') }}">

        <label class="form__label">住所</label>
        <input type="text" class="form__input" name="address" value="{{old('address', $profile ? $profile['address'] : '') }}">

        <label class="form__label">建物名</label>
        <input type="text" class="form__input" name="building" value="{{old('building', $profile ? $profile['building'] : '') }}">

        <button class="form__button" type="submit">更新する</button>
    </form>
</div>
@endsection