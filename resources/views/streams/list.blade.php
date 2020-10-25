@extends('layouts.main')

@section('title', 'Стримы')

@section('content')
    <x-page-title title="Стримы" description="Активные стримы на twitch.tv"/>
    <div class="row">
        @foreach($streams as $stream)
            <a href="{{ $stream->getLink() }}" class="stream__item col-3">
            <span class="stream__image" style="background-image: url({{ $stream->getImage() }})">
            <span class="stream--viewers"><i class="far fa-eye"></i> {{ $stream->viewers }}</span>
            </span>
                    <span class="stream--name"><span>{{ $stream->name }}</span></span>
                    <span class="stream--title">{{ $stream->title }}</span>
            </a>
        @endforeach
    </div>
@endsection
