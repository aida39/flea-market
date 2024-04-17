@extends('layouts.header_admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment-page.css') }}" />
@endsection

@section('content')
<div class="container">
    index
    {{-- <div class="left-container">
        <img src="{{asset($item['image_path'])}}" alt="item-image" class="item-image">
    </div>
    <div class="right-container">
        <div class="right-container-inner">
            <h1 class="item-name">{{$item['name']}}</h1>
            <div class="brand">{{$item['brand']}}</div>
            <span class="price">¥{{ number_format($item['price']) }}</span>

            <div class="comment__wrapper">
                @forelse($comments as $comment)
                <div class="comment__content">
                    <div class="comment__user-info">
                        <img src="{{ asset($comment->user->profile->image_path ?? asset('images/user.jpg')) }}" alt="user-image" class=" user-image--small">
                        @if($comment->user->profile)
                        <span class="comment__author">{{ $comment->user->profile->name }}</span>
                        @else
                        <span class="comment__author">新規ユーザー</span>
                        @endif
                    </div>
                    <div class="comment__textarea">
                        <p class="comment__text">{{$comment['comment']}}</p>
                        @if($comment->is_user_comment)
                        <form class="comment__delete-form" action="/comment/delete/{{$comment['id']}}" method="post">
                            @csrf
                            <input type="hidden" name="comment_id" value="{{$comment['id']}}">
                            <button type="submit" class="comment__delete-button" onclick="confirmAction(event, 'このコメントを削除しますか？');">
                                <span>×</span>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                @empty
                <p class=" comment__empty-message">コメントはありません</p>
                @endforelse
            </div>
            @if($is_available)
            <form action="/comment/{{$item['id']}}" method="post">
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
            @else
            <p>※売り切れのためコメントできません</p>
            @endif
        </div>
    </div>
</div> --}}
<script src="{{ asset('js/confirmation-window.js') }}"></script>
@endsection