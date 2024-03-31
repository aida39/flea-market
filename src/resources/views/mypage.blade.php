@extends('layouts.header')

@section('css')
@endsection

@section('content')
<div class="user-area">
    <div class="user-unit">
        <img src="{{ asset($profile['image_path'] ?? asset('images/user.jpg')) }}" class="user-image">

        <h1 class="section-heading">{{$profile['name'] ?? '新規ユーザー'}}</h1>
    </div>
    <a href="/mypage/profile" class="profile-link">プロフィールを編集</a>
</div>
<div class="tab">
    <ul class="tab-menu">
        <li class="tab-menu__item active">出品した商品</li>
        <li class="tab-menu__item">購入した商品</li>
    </ul>
    <div class="tab-content">
        <div class="tab-content__item show">
            <a href="/item/3">
                <img src="{{asset('images/item_01.jpg')}}" alt="item_image">
            </a>
            <a href="/item/4">
                <img src="{{asset('images/item_01.jpg')}}" alt="item_image">
            </a>
            <a href="/item/4">
                <img src="{{asset('images/item_01.jpg')}}" alt="item_image">
            </a>
        </div>
        <div class="tab-content__item">
            購入した商品はありません
        </div>
    </div>
</div>
<script src="{{ asset('js/tab-menu.js') }}"></script>
@endsection