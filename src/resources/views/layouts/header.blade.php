<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>COACHTECH フリマ</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div>
            <a href="/">
                <img class="header__logo" src="{{asset('images/logo.svg')}}" alt="logo">
            </a>
        </div>
        @if(request()->is('login') || request()->is('register'))
        @else
        <div>
            <form class="search__content__form" action="/search" method="get">
                @csrf
                <input class="header__search" type="search" name="keyword" placeholder="なにをお探しですか？" value="{{ request()->query('keyword') }}">
            </form>
        </div>
        @if (Auth::check())
        <ul class="header__link">
            <li class="header__link-item">
                <a href="/logout">ログアウト</a>
            </li>
            <li class="header__link-item">
                <a href="/mypage">マイページ</a>
            </li>
            <li class="header__link-item">
                @if (request()->is('sell'))
                @else
                <button class="header__link-button">
                    <a href="/sell">出品</a>
                </button>
                @endif
            </li>
        </ul>
        @else
        <ul class="header__link">
            <li class="header__link-item">
                <a href="/login">ログイン</a>
            </li>
            <li class="header__link-item">
                <a href="/register">会員登録</a>
            </li>
            <li class="header__link-item">
                <button class="header__link-button">
                    <a href="/sell">出品</a>
                </button>
            </li>
        </ul>
        @endif
        @endif
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>