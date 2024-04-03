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
            <div class="icon-area">
                <div class="favorite-icon">
                    <button>
                        <img src="{{asset('images/favorite-icon.jpg')}}" alt="favorite-icon">
                    </button>
                    <span class="count">3</span>
                </div>
                <div class="comment-icon">
                    <a href="/comment/{{$item['id']}}">
                        <img src="{{asset('images/comment-icon.jpg')}}" alt="comment-icon">
                    </a>
                    <span class="count">{{$comment_count}}</span>
                </div>
            </div>
            @foreach($comments as $comment)
            <div class="comment-area">
                <div class="comment-user-info">
                    <img src="{{ asset($comment->user->profile->image_path ?? asset('images/user.jpg')) }}" alt="user-image" class=" user-image--small">
                    @if($comment->user->profile)
                    <span class="comment-author">{{ $comment->user->profile->name }}</span>
                    @else
                    <span class="comment-author">新規ユーザー</span>
                    @endif
                </div>
                <p class="comment-text">{{$comment['comment']}}</p>
            </div>
            @endforeach
            <form action="/comment/{{$item['id']}}" method="post" class="comment-form">
                @csrf
                <label class="form__label">商品へのコメント</label>
                <textarea name="comment" class="form__textarea"></textarea>
                <button class="form__button" type="submit">コメントを送信する</button>
            </form>
        </div>
    </div>
</div>
@endsection