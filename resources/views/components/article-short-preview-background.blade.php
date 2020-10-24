<div class="articles--item background col-3">
    <div style="background-image: url({{ $article->getImage() }})">
        <a href="{{ $article->getLink() }}" class="background-dark fill">
            <span class="articles--item_title" data-toggle="tooltip"
                  data-placement="bottom"
                  title="{{ $article->getTitle() }}"
                  data-original-title="{{ $article->getTitle() }}">{{ $article->getTitle(100) }}</span>
            <span class="articles--item_description">{{ $article->getDescription(200) }}</span>
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
</div>
