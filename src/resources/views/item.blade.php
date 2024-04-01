@extends('layouts.header')

@section('css')
@endsection

@section('content')



<div class="container">
    <div class="left-container">
        <img src="{{asset($item['image_path'])}}" alt="item-image" class="item-image">
    </div>
    <div class="right-container">
        <div class="right-container-inner">
            <h1 class="item-name">{{$item['name']}}</h1>
            <div class="brand">{{$item['brand']}}</div>
            <span class="price">¥{{ number_format($item['price']) }}</span>
            <div class="feedback-area">
                <div class="favorite-unit">
                    <button>
                        <img src="{{asset('images/favorite-icon.jpg')}}" alt="favorite-icon">
                    </button>
                    <span class="count">3</span>
                </div>
                <div class="comment-unit">
                    <a href="">
                        <img src="{{asset('images/comment-icon.jpg')}}" alt="comment-icon">
                    </a>
                    <span class="count">3</span>
                </div>
            </div>
            <a href="" class="button-style">購入する</a>
            <h2 class="section-heading">商品説明</h2>
            <p class="section-text">{{$item['description']}}</p>
            <h2 class="section-heading">商品の情報</h2>
            <div class="subsection-area">
                <h3 class="subsection-heading">カテゴリー</h3>
                @foreach($categories as $category)
                <span class="item-category">{{ $category->name }}</span>
                @endforeach
            </div>
            <div class="subsection-area">
                <h3 class="subsection-heading">商品の状態</h3>
                <span class="subsection-text">{{$item->condition->name}}</span>
            </div>
        </div>
    </div>

</div>

@endsection