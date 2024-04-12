@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase-page.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="left-container ratio4-3">
        <div class="purchase__item-info">
            <img src="{{asset($item['image_path'])}}" alt="item-image" class="item-image--small">
            <div class="purchase__item-detail">
                <h1 class="purchase__name">{{$item['name']}}</h1>
                <span class="purchase__price">¥{{ number_format($item['price']) }}</span>
            </div>
        </div>

        <div class="purchase__payment-select">
            <h2 class="section-heading">支払い方法</h2>
            <a href="/purchase/payment/{{$item['id']}}" class="section-link">変更する</a>
        </div>
        <div class="purchase__payment-select">
            <h2 class="section-heading">配送先</h2>
            <a href="/purchase/address/{{$item['id']}}" class="section-link">変更する</a>
        </div>
    </div>
    <div class="right-container ratio4-3">
        <div class="purchase__wrapper">
            <form id="purchaseForm" action="/purchase/{{$item['id']}}" method="post">
                @csrf
                <div class="purchase__payment-info">
                    <ul>
                        <li>
                            <span class="purchase__payment-detail">商品代金</span>
                            <span>¥{{ number_format($item['price']) }}</span>
                        </li>
                        <li>
                            <span class="purchase__payment-detail">支払い金額</span>
                            <span>¥{{ number_format($item['price']) }}</span>
                        </li>
                        <li>
                            <span class="purchase__payment-detail">支払い方法</span>
                            <span>選択してください</span>
                        </li>
                        <li>
                            <span class="purchase__payment-detail">配送先</span>
                            @if($shipping_address)
                            <span>{{$shipping_address['address']}}</span>
                            <span>{{$shipping_address['building'] ?? '' }}</span>
                            @else
                            <span>選択してください</span>
                            @endif
                        </li>
                    </ul>
                </div>
                <input type="hidden" name="amount" id="amount" value="{{ $item['price'] }}">
                @if($shipping_address)
                <button class="form__button" type="button" onclick="openStripeCheckout()">購入する</button>
                @else
                <p class="button-style--disabled">購入する</p>
                @endif
            </form>
        </div>
    </div>
</div>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
    var stripeKey = "{{ env('STRIPE_KEY') }}";
</script>
<script src="{{ asset('js/stripe-payment.js') }}"></script>
@endsection