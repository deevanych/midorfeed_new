@extends('layouts.main')

@section('title', 'Новости')

@section('content')
    <x-page-title title="Новости" description="Последние новости"/>
    <x-articles-slider :articles="$news->take(2)"/>
    <x-articles-grid :links="$news->links()" :articles="$news->skip(2)"/>
@endsection
