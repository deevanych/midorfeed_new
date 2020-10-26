<div class="articles-grid">
    @foreach ($articles as $article)
        @if ($loop->iteration == 1 || $loop->iteration == 6 || $loop->iteration == 8)
            <x-article-short-preview :article="$article"/>
        @endif
        @if ($loop->iteration == 2)
            <x-article-short-preview-background-white :article="$article"/>
        @endif
        @if ($loop->iteration == 3 || $loop->iteration == 5)
            <x-article-short-preview-reverse :article="$article"/>
        @endif
        @if ($loop->iteration == 4 || $loop->iteration == 7)
            <x-article-short-preview-background :article="$article"/>
        @endif
    @endforeach
    {!! $links !!}
</div>
