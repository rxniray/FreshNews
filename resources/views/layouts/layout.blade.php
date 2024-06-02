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
                <ul>
                    <li><h3><a href="{{ route('index') }}"><div class="circle__block"></div>FreshNews</a></h3></li>
                </ul>
                <ul class="search__tags">
            <form method="POST" action="{{ route('tag_search')}}">
                @csrf
                <li> 
                    <input type="text" name="search" placeholder="Search...">
                </li>
            </form>
        </ul>
                <ul class="nav__nav">
                    @if( auth()->check() )
                        <li>
                            <a href="{{ route('auth.logout')}}" class="logout__button">Logout</a>
                        </li>
                        <li class="avatar-user__header">
                            <a href="{{route('profile', auth()->id())}}" class="nickname-user__avatar">{{ auth()->user()->name }} <span><</span></a>

                            <a href="{{route('profile', auth()->id())}}" >
                                <div style="width: 40px; height: 40px; ">
                                <img src="{{ asset('avatars/' . (auth()->user()->avatar && file_exists(public_path('avatars/' . auth()->user()->avatar)) ? auth()->user()->avatar : 'default-avatar.png')) }}" 
                                    alt="User Avatar" 
                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                                </div>
                            </a>
                        </li>
                    @else
                        <li><a href="{{route('auth.login')}}" class="log-reg__button">Login</a></li>
                        <li><a href="{{ route('registration') }}" class="log-reg__button">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
        
    </nav>
    <main class="main__content" style="padding-top: 0px">
        
        <div class="main__container">
            <div class="main__blocks">
                <div class="aside__block">
                @if(auth()->check())
                    <p class="upload__image"><a href="{{ route('create_image') }}">Upload News</a></p>
                @endif
                <div class="tags__list">
                    <h4>Themes</h4>
                @foreach ($all_tags as $tag)
                    <a href="{{ route('tag', $tag->name )}}"><p>{{ $tag->name }} ({{$tag->images_count}})</p></a>
                @endforeach
                </div>
                </div>
                <div class="main__block">
                @yield('content')
            </div>
        </div>
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