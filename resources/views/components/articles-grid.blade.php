<div class="articles-grid">
    @foreach ($articles as $article)
        @if ($loop->iteration == 1)
            <x-article-short-preview :article="$article"/>
        @endif
        @if ($loop->iteration == 2)
                <x-article-short-preview-background-white :article="$article"/>
        @endif
        @if ($loop->iteration == 3)
            <x-article-short-preview-reverse :article="$article"/>
        @endif
        @if ($loop->iteration == 4)
                <x-article-short-preview-background :article="$article"/>
        @endif
    @endforeach
</div>
