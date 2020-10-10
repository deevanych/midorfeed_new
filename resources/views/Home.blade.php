@extends('layouts.main')

@section('content')
    @include('home/NewsSlider')
    <x-section title="Стримы" moreLink="{{ route('streams.index') }}">
        @include('home/StreamsSlider')
    </x-section>
@endsection
