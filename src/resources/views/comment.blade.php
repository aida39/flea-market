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
                    <form action="{{ url('/favorite/'.$item['id']) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <button type="submit">
                            <img src="{{ asset($is_favorite ? 'images/favorite-on.jpg' : 'images/favorite-off.jpg') }}" alt="favorite-icon">
                        </button>
                    </form>
                    <span class="count">{{$favorite_count}}</span>
                </div>
                <div class="comment-icon">
                    <a href="/comment/{{$item['id']}}">
                        <img src="{{asset('images/comment-icon.jpg')}}" alt="comment-icon">
                    </a>
                    <span class="count">{{$comment_count}}</span>
                </div>
            </div>
            @forelse($comments as $comment)
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
            @empty
            <p class="comment-empty">コメントはありません</p>
            @endforelse
            <form action="/comment/{{$item['id']}}" method="post" class="comment-form">
                @csrf
                <div class="form__item--compact">
                    <label class="form__label">商品へのコメント</label>
                    <textarea name="comment" class="form__textarea">{{ old('comment') }}</textarea>
                    <div class="error-message">
                        @error('comment')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <button class="form__button" type="submit">コメントを送信する</button>
            </form>
        </div>
    </div>
</div>
@endsection