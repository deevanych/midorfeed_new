<div class="col-3">
    <a class="articles--item background-white" href="{{ $article->getLink() }}">
            <span class="articles--item_title" data-toggle="tooltip"
                  data-placement="bottom"
                  title="{{ $article->getTitle() }}"
                  data-original-title="{{ $article->getTitle() }}">{{ $article->getTitle(160) }}</span>
        <span class="articles--item_description">{{ $article->getDescription(290) }}</span>
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
</div>
