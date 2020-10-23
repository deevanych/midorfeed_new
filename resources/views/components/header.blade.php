<header class="row">
    <div class="col-auto">
        <a href="/" class="logo">#мидорфид</a>
    </div>
    <nav class="col">
        <a href="{{ route('news.index') }}">Новости</a>
        <a href="{{ route('streams.index') }}">Стримы</a>
    </nav>
    <div class="col-auto info-block">
        @widget('GameVersionWidget')
        @widget('GameStatusWidget')
        @guest
            <a href="{{ route('login') }}" class="login--button">
                <i class="fab fa-steam"></i>войти
            </a>
        @endguest
        @auth
            <a href="{{ Auth::user()->link }}" class="profile-link">
                <img src="{{ asset(Storage::url('avatars/'.Auth::user()->steamid.'.jpg')) }}" class="hover_shadow"/>{{ Auth::user()->personaname }}
            </a>
        @endauth
    </div>
</header>
