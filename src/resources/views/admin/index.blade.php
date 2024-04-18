@extends('layouts.header_admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
<link rel="stylesheet" href="{{ asset('css/comment-page.css') }}" />
@endsection

@section('content')
<div class="admin__container">
    <h1 class="page-title">管理画面</h1>
    <form action="/admin/index" method="get">
        @csrf
                <input type="radio" id="item" name="display" value="comments_by_item">
                <label class="admin__label" for="item">商品別コメントを表示</label>
                <input type="radio" id="user" name="display" value="comments_by_user">
                <label class="admin__label" for="user">ユーザー別コメントを表示</label>
                <input type="radio" id="list" name="display" value="user_list">
                <label class="admin__label" for="list">ユーザーのみ表示</label>
        <button class="admin__button" type="submit">表示する</button>
    </form>
    @if ($display === 'comments_by_item'  || $display === null)
        <h2 class="admin__heading">商品別コメント</h2>
        @foreach($items as $item)
        <div class="admin__comment-block">
            <h3 class="admin__subheading">{{ $item->name}}</h3>
            <span>{{ $item->brand}}</span>
                @foreach ($item->comments as $comment)
                <div class="admin__comment-area">
                    <div class="comment__user-info">
                        <img src="{{ asset($comment->user->profile->image_path ?? asset('images/user.jpg')) }}" alt="user-image" class=" user-image--small">
                        <span class="comment__author">{{ $comment->user->profile->name ?? '新規ユーザー' }}</span>
                    </div>
                    <div class="comment__textarea">
                        <p class="comment__text">{{$comment->comment}}</p>
                        <form class="comment__delete-form" action="/admin/comment/delete/{{$comment->id}}" method="post">
                            @csrf
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <button type="submit" class="comment__delete-button" onclick="confirmAction(event, 'このコメントを削除しますか？');">
                                <span>×</span>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
        </div>
        @endforeach
        
    @elseif ($display === 'comments_by_user')
        <h2 class="admin__heading">ユーザ別コメント</h2>
        @foreach($users as $user)
        <div class="admin__comment-block">
            <div class="comment__user-info">
                <img src="{{ asset($user->profile->image_path ?? asset('images/user.jpg')) }}" alt="user-image" class=" user-image--small">
                <span class="comment__author">{{ $user->profile->name ?? '新規ユーザー' }}</span>
                <span class="comment__author">{{ $user->email}}</span>
            </div>
                @foreach ($user->comments as $comment)
                <div class="admin__comment-area">
                    <div class="comment__textarea">
                        <p class="comment__text">{{$comment->comment}}</p>
                        <form class="comment__delete-form" action="/admin/comment/delete/{{$comment->id}}" method="post">
                            @csrf
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <button type="submit" class="comment__delete-button" onclick="confirmAction(event, 'このコメントを削除しますか？');">
                                <span>×</span>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
        </div>
        @endforeach
    @elseif ($display === 'user_list')
        <h2 class="admin__heading">ユーザ一覧</h2>
        <p class="admin__message">※ユーザーを削除するとそのユーザーのコメントも全て削除されます</p>

            @foreach ($users as $user)
                <div class="admin__comment-area">
                    <img src="{{ asset($user->profile->image_path ?? asset('images/user.jpg')) }}" alt="user-image" class=" user-image--small">
                    <span class="comment__author">{{ $user->profile->name ?? '新規ユーザー'}}</span>
                    <span class="comment__author">{{ $user->email}}</span>
                    <form class="comment__delete-form" action="/admin/user/delete/{{$user->id}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="submit" class="comment__delete-button" onclick="confirmAction(event, 'このユーザーを削除しますか？');">
                            <span>×</span>
                        </button>
                    </form>
                </div>
            @endforeach
    @endif
</div>
<script src="{{ asset('js/confirmation-window.js') }}"></script>
@endsection