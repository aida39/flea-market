@extends('layouts.header_admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/comment-page.css') }}" />
@endsection

@section('content')
    <div class="tab">
        <ul class="tab-menu">
            <li class="tab-menu__item active">コメント一覧</li>
            <li class="tab-menu__item">ユーザー一覧</li>
        </ul>
        <div class="tab-content">
            <div class="tab-content__item show">
                <div class="admin__container">
                    @foreach ($items as $item)
                        <div class="admin__comment-block">
                            <img src="{{ asset($item['image_path']) }}" alt="item-image" class="item-image--small">
                            <h3 class="admin__subheading">{{ $item->name }}</h3>
                            <span>{{ $item->brand }}</span>
                            @foreach ($item->comments as $comment)
                                <div class="admin__comment-area">
                                    <div class="comment__user-info">
                                        <img src="{{ asset($comment->user->profile->image_path ?? asset('images/user.jpg')) }}"
                                            alt="user-image" class=" user-image--small">
                                        <span class="comment__author">{{ $comment->user->profile->name ?? '新規ユーザー' }}</span>
                                    </div>
                                    <div class="comment__textarea">
                                        <p class="comment__text">{{ $comment->comment }}</p>
                                        <form class="comment__delete-form"
                                            action="/admin/comment/delete/{{ $comment->id }}" method="post">
                                            @csrf
                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                            <button type="submit" class="comment__delete-button"
                                                onclick="confirmAction(event, 'このコメントを削除しますか？');">
                                                <span>×</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-content__item">
                <div class="admin__container">
                    <p class="admin__message">※ユーザーを削除するとそのユーザーのコメントも全て削除されます</p>
                    @foreach ($users as $user)
                        <div class="admin__comment-area">
                            <img src="{{ asset($user->profile->image_path ?? asset('images/user.jpg')) }}" alt="user-image"
                                class=" user-image--small">
                            <span class="comment__author">{{ $user->profile->name ?? '新規ユーザー' }}</span>
                            <span class="comment__author">{{ $user->email }}</span>
                            <form class="comment__delete-form" action="/admin/user/delete/{{ $user->id }}"
                                method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit" class="comment__delete-button"
                                    onclick="confirmAction(event, 'このユーザーを削除しますか？');">
                                    <span>×</span>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('js/tab-menu.js') }}"></script>
    <script src="{{ asset('js/confirmation-window.js') }}"></script>
@endsection
