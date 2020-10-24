<a href="{{ $article->getLink() }}" class="articles--item col-3">
    <span class="articles--item_image"
          style="background-image: url({{ $article->getImage() }})"></span>
    <span href="{{ $article->getLink() }}" class="articles--item_title" data-toggle="tooltip"
          data-placement="bottom"
          title="{{ $article->getTitle() }}"
          data-original-title="{{ $article->getTitle() }}">{{ $article->getTitle(80) }}</span>
    <span class="articles--item_description">{{ $article->getDescription(100) }}</span>
    <span class="articles--item_author" data-site="dota2.ru">
                    <span data-toggle="tooltip"
                          data-placement="bottom"
                          title="{{ $article->getTranslatedDate() }}"
                          data-original-title="{{ $article->getTranslatedDate() }}">
                        dota2.ru,
                        {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}
                    </span>
                </span>
</a>
