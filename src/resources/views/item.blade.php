@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="left-container">
            <img src="{{ asset($item['image_path']) }}" alt="item-image" class="item-image">
        </div>
        <div class="right-container">
            <div class="right-container-inner">
                <h1 class="item-name">{{ $item['name'] }}</h1>
                <div class="brand">{{ $item['brand'] }}</div>
                <span class="price">¥{{ number_format($item['price']) }}</span>
                <div class="icon-area">
                    <div class="favorite-icon">
                        <form action="{{ url('/favorite/' . $item['id']) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <button type="submit">
                                <img src="{{ asset($is_favorite ? 'images/favorite-on.jpg' : 'images/favorite-off.jpg') }}"
                                    alt="favorite-icon">
                            </button>
                        </form>
                        <span class="count">{{ $favorite_count }}</span>
                    </div>
                    <div class="comment-icon">
                        <a href="/comment/{{ $item['id'] }}">
                            <img src="{{ asset('images/comment-icon.jpg') }}" alt="comment-icon">
                        </a>
                        <span class="count">{{ $comment_count }}</span>
                    </div>
                </div>
                @if ($is_available)
                    <a href="/purchase/{{ $item['id'] }}" class="button-style">購入する</a>
                @else
                    <p class="button-style--disabled">売り切れました</p>
                @endif
                <h2 class="section-heading">商品説明</h2>
                <p class="section-text">{{ $item['description'] }}</p>
                <h2 class="section-heading">商品の情報</h2>
                <div class="subsection-area">
                    <h3 class="subsection-heading">カテゴリー</h3>
                    @foreach ($categories as $category)
                        <span class="category">{{ $category->name }}</span>
                    @endforeach
                </div>
                <div class="subsection-area">
                    <h3 class="subsection-heading">商品の状態</h3>
                    <span class="subsection-text">{{ $item->condition->name }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
