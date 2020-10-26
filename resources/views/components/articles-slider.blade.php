<section class="row">
    <div class="col">
        <div class="main-news" style="background-image: url({{ $mainArticle->getImage() }})">
            <div class="row h-100">
                <a href="{{ $mainArticle->getLink() }}" class="col h-100">
                    <div class="news-content">
                        <span class="news-title">{{ $mainArticle->title }}</span>
                        <span class="news-info">
                <span class="news-author" data-site="dota2.ru">
                  <span data-toggle="tooltip"
                        data-placement="bottom"
                        title="{{ $mainArticle->getTranslatedDate() }}"
                        data-original-title="{{ $mainArticle->getTranslatedDate() }}">dota2.ru, {{ \Carbon\Carbon::parse($mainArticle->created_at)->diffForHumans() }}</span>
                </span>
                    <span data-toggle="tooltip"
                          data-placement="bottom"
                          title="Количество просмотров"
                          data-original-title="Количество просмотров"><i
                            class="far fa-eye"></i> {{ $mainArticle->views }}</span>
                    <span data-toggle="tooltip" data-placement="bottom" title="Время прочтения"
                          data-original-title="Время прочтения"><i
                            class="fas fa-stopwatch"></i> {{ $mainArticle->getReadTime() }} мин.</span>
                    <span data-toggle="tooltip" data-placement="bottom" title="Комментарии"
                          data-original-title="Комментарии"><i
                            class="far fa-comment"></i> {{ $mainArticle->getCommentsCount() }}</span>
              </span>
                        <span class="news-description">{{ $mainArticle->getDescription() }}</span>
                    </div>
                </a>
                <div class="col-3 h-100 py-5">
                    <div class="additional-news slick" data-autoplay="true" data-fade="true" data-dots="true">
                        @foreach ($articles as $article)
                            <a class="additional-news__item" href="{{ $article->getLink() }}">
                            <span
                                class="image" style="background-image: url({{ $article->getImage() }})"></span>
                                <span
                                    class="news-title">{{ $article->title }}</span>
                                <span class="news-author" data-site="dota2.ru">
                              <span data-toggle="tooltip"
                                    data-placement="bottom"
                                    title="{{ $article->getTranslatedDate() }}"
                                    data-original-title="{{ $article->getTranslatedDate() }}">dota2.ru, {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</span>
                            </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
