@extends('layouts.header')

@section('css')
@endsection

@section('content')
<div class="tab">
    <ul class="tab-menu">
        <li class="tab-menu__item active">おすすめ</li>
        <li class="tab-menu__item">マイリスト</li>
    </ul>
    <div class="tab-content">
        <div class="tab-content__item show">
            @foreach($items as $item)
            <a href="/item/{{$item['id']}}">
                <img src="{{asset('images/item_01.jpg')}}" alt="item_image">
            </a>
            @endforeach
        </div>
        <div class="tab-content__item">
            マイリストはありません
        </div>
    </div>
</div>
<script src="{{ asset('js/tab-menu.js') }}"></script>
@endsection