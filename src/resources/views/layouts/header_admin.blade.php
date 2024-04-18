<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div>
            <a href="/admin/index">
                <img class="header__logo" src="{{asset('images/logo.svg')}}" alt="logo">
            </a>
        </div>
        @if (Auth::guard('admin')->check())
        <ul class="header__link">
            <li class="header__link-item">
                <a href="/admin/logout">ログアウト</a>
            </li>
            <li class="header__link-item">
                <a href="/admin/mail">メール送信</a>
            </li>
        </ul>
        @else
        @endif
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>