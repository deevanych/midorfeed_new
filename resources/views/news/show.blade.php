@extends('layouts.main')

@section('title', $news->title)
@section('description', $news->getDescription())
@section('keywords', $news->getKeywords())
@section('image', asset($news->getImage()))

@section('content')
    <article class="news-show__item" itemscope itemtype="http://schema.org/Article">
        <h1 class='news-title' itemprop="headline">{{ $news->title }}</h1>
        <img class='news-image' itemprop="url image" src='{{ $news->getImage() }}'/>
        <div class="row">
            <div class="col-3">
                <x-article-meta views="{{ $news->views }}"
                                readTime="{!! $news->getReadTime() !!}"
                                commentsCount="{{ $news->getCommentsCount() }}"
                                rating="{{ $news->rating_value }}"></x-article-meta>
                <div class="divider"></div>
                <span class="news-author" data-site="dota2.ru">
                    <span data-toggle="tooltip"
                          data-placement="bottom"
                          title="{{ $news->getTranslatedDate() }}"
                          data-original-title="{{ $news->getTranslatedDate() }}">
                        <a href="{{ $news->source_link }}" target='_blank' noindex>dota2.ru</a>,
                        {{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}
                    </span>
                </span>
                <div class="divider"></div>
                <x-share-block title="{{ $news->title }}"/>
                <div class="divider"></div>
                <x-tags :tags="$news->tags"/>
            </div>
            <div class="col-6">
                <section class="news-text" itemprop="articleBody">
                    {!! $news->text !!}
                </section>
                <div class="divider"></div>
                <!-- Yandex.RTB R-A-396149-5 -->
                <div id="yandex_rtb_R-A-396149-5"></div>
                <script type="text/javascript">
                    (function (w, d, n, s, t) {
                        w[n] = w[n] || [];
                        w[n].push(function () {
                            Ya.Context.AdvManager.render({
                                blockId: "R-A-396149-5",
                                renderTo: "yandex_rtb_R-A-396149-5",
                                async: true
                            });
                        });
                        t = d.getElementsByTagName("script")[0];
                        s = d.createElement("script");
                        s.type = "text/javascript";
                        s.src = "//an.yandex.ru/system/context.js";
                        s.async = true;
                        t.parentNode.insertBefore(s, t);
                    })(this, this.document, "yandexContextAsyncCallbacks");
                </script>
                <div class="divider"></div>
                <comments/>
            </div>
            <div class="col-3">
                <div id="yandex_rtb_R-A-396149-4"></div>
                <script type="text/javascript">
                    (function (w, d, n, s, t) {
                        w[n] = w[n] || [];
                        w[n].push(function () {
                            Ya.Context.AdvManager.render({
                                blockId: "R-A-396149-4",
                                renderTo: "yandex_rtb_R-A-396149-4",
                                async: true
                            });
                        });
                        t = d.getElementsByTagName("script")[0];
                        s = d.createElement("script");
                        s.type = "text/javascript";
                        s.src = "//an.yandex.ru/system/context.js";
                        s.async = true;
                        t.parentNode.insertBefore(s, t);
                    })(this, this.document, "yandexContextAsyncCallbacks");
                </script>
            </div>
        </div>
    </article>
@endsection
