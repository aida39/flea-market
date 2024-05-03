@extends('layouts.header')

@section('content')
    @if (session('result'))
        <div class="flash-message">
            {{ session('result') }}
        </div>
    @endif
    <div class="tab">
        <ul class="tab-menu">
            <li class="tab-menu__item active">おすすめ</li>
            <li class="tab-menu__item">マイリスト</li>
        </ul>
        <div class="tab-content">
            <div class="tab-content__item show">
                @forelse($items as $item)
                    <a href="/item/{{ $item['id'] }}">
                        <img class="tab-content__image" src="{{ asset($item['image_path']) }}" alt="item_image">
                    </a>
                @empty
                    <p>商品はありません</p>
                @endforelse
            </div>
            <div class="tab-content__item">
                @if (Auth::check())
                    @forelse($favorite_items as $favorite_item)
                        <a href="/item/{{ $favorite_item['id'] }}">
                            <img class="tab-content__image" src="{{ asset($favorite_item['image_path']) }}"
                                alt="item_image">
                        </a>
                    @empty
                        <p>お気に入り商品はありません</p>
                    @endforelse
                @else
                    ログイン後に表示されます
                @endif
            </div>
        </div>
    </div>
    <script src="{{ asset('js/tab-menu.js') }}"></script>
@endsection
