@extends('layouts.main')

@section('content')
    <article class="news-show__item" itemscope itemtype="http://schema.org/Article">
        <h1 class='news-title' itemprop="headline">{{ $news->title }}</h1>
        <img class='news-image' itemprop="url image" src='{{ $news->getImage() }}'/>
        <div class="row">
            <div class="col-3">
                <span class="news-author" data-site="dota2.ru">
                    <span>
                        <a href="{{ $news->source_link }}" target='_blank' noindex>dota2.ru</a>,
                        {{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}
                    </span>
                </span>

            </div>
            <div class="col">
                <section class="news-text" itemprop="articleBody">
                    {!! $news->text !!}
                </section>
            </div>
            <div class="col-3">

            </div>
        </div>
    </article>
@endsection
