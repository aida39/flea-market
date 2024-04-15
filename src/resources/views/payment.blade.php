@extends('layouts.header')

@section('css')
@endsection

@section('content')
<div class="form__container">
    <h1 class="page-title">支払い方法の変更</h1>
    <form action="/purchase/payment/{{$id}}" method="post">
        @csrf
        <div class="form__item">
            @foreach($payment_types as $payment_type)
            <div class="form__radio-wrapper">
                <input type="radio" id="{{$payment_type['id']}}" name="id" value="{{$payment_type['id']}}" {{ isset($selected_payment_type) && $selected_payment_type['id'] == $payment_type['id'] ? 'checked' : '' }}>
                <label for="{{$payment_type['id']}}">{{$payment_type['name']}}</label><br>
            </div>
            @endforeach
        </div>
        <div class="error-message">
            @error('id')
            {{ $message }}
            @enderror
        </div>
        <button class="form__button" type="submit">更新する</button>
    </form>
</div>
@endsection