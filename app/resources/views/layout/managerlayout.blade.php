<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '飲食店レビュー') }} - 管理画面</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300;400;500&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    @yield('stylesheet')
</head>

<body class="marble-bg">
    <div id="app" style="display: flex; flex-direction: column; min-height: 100vh;">
        <nav class="navbar navbar-marble">
            <div class="container">
                <a class="navbar-brand-marble" href="{{ url('/') }}">
                    <span>◇</span> システム管理 <span>◇</span>
                </a>

                <div class="nav-marble">
                    @if(Auth::check())
                    <div class="user-name-marble">
                        Admin: {{ Auth::user()->name }}
                    </div>
                    <a class="nav-link-marble" href="{{ route('manager') }}">
                        管理者ダッシュボード
                    </a>
                    <a href="#" id="logout" class="logout-link-marble">
                        ログアウト
                    </a>
                    <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <a class="nav-link-marble" href="{{ route('login') }}">ログイン</a>
                    <a class="register-link-marble" href="{{ route('register')}}">新規登録</a>
                    @endif
                </div>
            </div>
        </nav>

        <main class="py-4 flex-grow-1">
            @yield('content')
        </main>

        <footer class="footer-marble">
            <div class="container">
                <div class="footer-text">
                    &copy; {{ date('Y') }} <span>◇</span> LuxReview System <span>◇</span>
                </div>
            </div>
        </footer>
    </div>

    <script>
        const logoutLink = document.getElementById('logout');
        if (logoutLink) {
            logoutLink.addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('logout-form').submit();
            });
        }
    </script>
</body>

</html>