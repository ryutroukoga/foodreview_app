<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '飲食店レビュー') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    @yield('stylesheet')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-marble">
            <div class="container">
                <a class="navbar-brand-marble" href="{{ url('/') }}">
                    飲食店レビューサイト
                </a>
                @if(Auth::check())
                <ul class="nav nav-marble">
                    <span class="user-name-marble">{{ Auth::user()->name }}</span>
                    <li class="nav-item">
                        <a class="nav-link-marble" href="{{ route('mainpage') }}">メインページへ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-marble" href="{{ route('profile') }}">プロフィールへ</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="logout" class="logout-link-marble">ログアウト</a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                    @csrf
                </form>
                <script>
                    document.getElementById('logout').addEventListener('click', function(event) {
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                    });
                </script>
                @else

                <ul class="nav nav-marble">
                    <li class="nav-item">
                        <a class="nav-link-marble" href="{{ route('mainpage') }}">メインページへ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-marble" href="{{ route('login') }}">ログイン</a>
                    </li>
                    <li class="nav-item">
                        <a class="register-link-marble" href="{{ route('register')}}">新規会員登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-marble" href="{{ route('shop.login') }}">店舗アカウント</a>
                    </li>
                </ul>
                @endif
            </div>
        </nav>
        @yield('content')
    </div>
</body>

</html>