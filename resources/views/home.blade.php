@extends('layouts.main')

@section('content')
    <x-articles-slider :articles="$news->take(5)"/>
    <x-articles-grid :articles="$news->skip(5)"/>
    <x-section title="Стримы" moreLink="{{ route('streams.index') }}">
        @include('home/streamsSlider')
    </x-section>
@endsection
