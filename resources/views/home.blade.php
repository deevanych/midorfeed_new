@extends('layouts.main')

@section('content')
    @include('home/newsSlider')
    <x-articles-grid :articles="$news->slice(5, 4)"/>
    <x-section title="Стримы" moreLink="{{ route('streams.index') }}">
        @include('home/streamsSlider')
    </x-section>
@endsection
