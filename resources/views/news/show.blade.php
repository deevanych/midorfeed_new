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
                <comments/>
            </div>
            <div class="col-3">

            </div>
        </div>
    </article>
@endsection
