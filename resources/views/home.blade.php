@extends('layouts.main')

@section('content')
    @include('home/newsSlider')
    <x-section title="Стримы" moreLink="{{ route('streams.index') }}">
        @include('home/streamsSlider')
    </x-section>
@endsection
