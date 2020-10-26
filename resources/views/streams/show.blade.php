@extends('layouts.main')

@section('title', $stream->name)
@section('description', $stream->title)
@section('image', asset($stream->getImage()))

@section('content')
    <x-page-title title="{{ $stream->name }}" description="{!! $stream->title !!}"/>
    <div class="row twitch-stream">
        <div class="col">
            <div class="twitch-player" data-name="{{ $stream->name }}"></div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <comments/>
        </div>
    </div>
@endsection
