<section class="row">
    <div class="col main-news" style="background-image: url({{ $news[0]->getImage() }})">
        <div class="row h-100">
            <a href="{{ $news[0]->getLink() }}" class="col h-100">
                <div class="news-content">
                    <span class="news-title">{{ $news[0]->title }}</span>
                    <span class="news-info">
                <span class="news-author" data-site="dota2.ru">
                  <span>dota2.ru, {{ \Carbon\Carbon::parse($news[0]->created_at)->diffForHumans() }}</span>
                </span>
                    <span data-toggle="tooltip"
                          data-placement="bottom"
                          title="Количество просмотров"
                          data-original-title="Количество просмотров"><i
                            class="far fa-eye"></i> {{ $news[0]->views }}</span>
                    <span data-toggle="tooltip" data-placement="bottom" title="Время прочтения"
                          data-original-title="Время прочтения"><i
                            class="fas fa-stopwatch"></i> {{ $news[0]->getReadTime() }} мин.</span>
              </span>
                    <span class="news-description">{{ $news[0]->getDescription() }}</span>
                </div>
            </a>
            <div class="col-3 h-100 py-5">
                <div class="additional-news slick" data-autoplay="true" data-fade="true" data-dots="true">
                    @for ($i = 1; $i < 5; $i++)
                        <a class="additional-news__item" href="{{ $news[$i]->getLink() }}">
                            <span
                                class="image" style="background-image: url({{ $news[$i]->getImage() }})"></span>
                            <span
                                class="news-title">{{ $news[$i]->title }}</span>
                            <span class="news-author" data-site="dota2.ru">
                              <span>dota2.ru, {{ \Carbon\Carbon::parse($news[$i]->created_at)->diffForHumans() }}</span>
                            </span>
                        </a>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
