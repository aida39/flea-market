<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>COACHTECH フリマ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div>
            <img class="header__logo" src="{{asset('images/logo.svg')}}" alt="logo">
        </div>
        <div>
            <input class="header__search" type="text" placeholder="なにをお探しですか？">
        </div>
        <ul class="header__link">
            <li class="header__link-item">
                <a href="/">ログイン</a>
            </li>
            <li class="header__link-item">
                <a href="/logout">会員登録</a>
            </li>
            <li class="header__link-item">
                <button class="header__link-button">
                    <a href="/mypage">出品</a>
                </button>
            </li>
        </ul>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>