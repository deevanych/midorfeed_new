<div class="slick" data-show="4" data-infinite="false" data-arrows="true">
    @foreach($streams as $stream)
        <a href="{{ $stream->getLink() }}" class="stream__item">
        <span class="stream__image" style="background-image: url({{ $stream->getImage() }})">
        <span class="stream--viewers"><i class="far fa-eye"></i> {{ $stream->viewers }}</span>
        </span>
            <span class="stream--name"><span>{{ $stream->name }}</span></span>
            <span class="stream--title">{{ $stream->title }}</span>
        </a>
    @endforeach
</div>
