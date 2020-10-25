@extends('layouts.main')

@section('title', $stream->name)
@section('description', $stream->title)
@section('image', asset($stream->getImage()))

@section('content')
    <x-page-title title="{{ $stream->name }}" description="{!! $stream->title !!}"/>
    <div class="row twitch-stream">
        <div class="col">
            <div class="twitch-player embed-responsive embed-responsive-16by9" data-name="{{ $stream->name }}"></div>
        </div>
        <div class="col-auto">
            <iframe frameborder="0"
                    class="twitch-chat"
                    src="https://www.twitch.tv/embed/{{ $stream->name }}/chat?parent=localhost">
            </iframe>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <comments/>
        </div>
    </div>
@endsection
