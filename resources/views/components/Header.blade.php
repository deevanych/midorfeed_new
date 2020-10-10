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
    </div>
</header>
