<section class="home--section">
    <div class="row">
        <div class="col section--title">
            <h3>{{ $title }}</h3>
            <a href="{{ $moreLink }}" class="more-link">Посмотреть все</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ $slot }}
        </div>
    </div>
</section>
