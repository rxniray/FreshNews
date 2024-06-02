<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FreshNews</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
    <link id="favicon" rel="icon" href="{{ asset('favicon-active.ico') }}" type="image/x-icon">
</head>
<body>
    <nav class="nav__header">
        <div class="nav__container">
            <div class="nav__block">
                <ul >
                    <li><h3><a href="{{ route('index') }}"><div class="circle__block"></div>FreshNews</a></h3></li>
                </ul>
                <ul class="nav__nav">
                    @if( auth()->check() )
                        <li>
                            <a href="{{ route('auth.logout')}}" class="logout__button">Logout</a>
                        </li>
                        <li class="avatar-user__header">
                            <a href="{{route('profile', auth()->id())}}" class="nickname-user__avatar">{{ auth()->user()->name }} <span><</span></a>
                        </li>
                    @else
                    <li><a href="{{route('auth.login')}}" class="log-reg__button">Login</a></li>
                    <li><a href="{{ route('registration') }}" class="log-reg__button">Register</a></li>
                @endif
            </ul>
            </div>
        </div>
    </nav>
    <main style="padding-top: 0px">
        @yield('content')
    </main>
<script>
    document.addEventListener('visibilitychange', function() {
        var favicon = document.getElementById('favicon');
        if (document.hidden) {
            // Користувач неактивний
            favicon.href = '{{ asset('favicon-inactive.ico') }}';
        } else {
            // Користувач активний
            favicon.href = '{{ asset('favicon-active.ico') }}';
        }
    });
</script>

</body>
</html>