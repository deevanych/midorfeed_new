<a href="{{ $article->getLink() }}" class="articles--item col-3">
    <span href="{{ $article->getLink() }}" class="articles--item_title" data-toggle="tooltip"
          data-placement="bottom"
          title="{{ $article->getTitle() }}"
          data-original-title="{{ $article->getTitle() }}">{{ $article->getTitle(50) }}</span>
    <span class="articles--item_description">{{ $article->getDescription(90) }}</span>
    <x-article-meta views="{{ $article->views }}"
                    readTime="{!! $article->getReadTime() !!}"
                    commentsCount="{{ $article->getCommentsCount() }}"
                    rating="{{ $article->rating_value }}"></x-article-meta>
    <span class="articles--item_author" data-site="dota2.ru">
                    <span data-toggle="tooltip"
                          data-placement="bottom"
                          title="{{ $article->getTranslatedDate() }}"
                          data-original-title="{{ $article->getTranslatedDate() }}">
                        dota2.ru,
                        {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}
                    </span>
                </span>
    <span class="articles--item_image"
          style="background-image: url({{ $article->getImage() }})"></span>
</a>
