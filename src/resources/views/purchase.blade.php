@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase-page.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="left-container ratio3-2">
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
    <div class="right-container ratio3-2">
        <div class="right-container-inner">
            <form action="/purchase/{{$item['id']}}" method="post">
                @csrf
                <div class="purchase__payment-info">
                    <ul>
                        <li>
                            <span class="purchase__payment-detail">商品代金</span>
                            <span>¥{{ number_format($item['price']) }}</span>
                        </li>
                        <li>
                            <span class="purchase__payment-detail">配送先</span>
                            <span>入力されていません</span>
                        </li>
                        <li>
                            <span class="purchase__payment-detail">支払い金額</span>
                            <span>¥{{ number_format($item['price']) }}</span>
                        </li>
                        <li>
                            <span class="purchase__payment-detail">支払い方法</span>
                            <span>選択されていません</span>
                        </li>
                    </ul>
                </div>
                <button class="form__button">購入する</button>
            </form>
        </div>
    </div>
</div>
@endsection