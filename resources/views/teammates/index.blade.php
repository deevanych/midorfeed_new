@extends('layouts.main')

@section('title', 'Поиск игроков')

@section('content')
    <x-page-title title="Поиск команды" description="Заявки на совместную игру"/>
    <div class="row">
        <div class="col-7">
            @foreach($orders as $order)
                <div class="row">
                    <div class="col">
                        <div class="find-order__item">
                            <div class="background fill blur"
                                 style="background-image: url({{ asset(Storage::url('avatars/'.$order->user->steamid.'.jpg')) }})"></div>
                            <div class="background-dark fill"></div>
                            <div class="find-order__item-body">
                                <div class="find-order__item-image"
                                     style="background-image: url({{ asset(Storage::url('avatars/'.$order->user->steamid.'.jpg')) }})"></div>
                                <div class="find-order__item-text">
                                    <h2>{{ $order->user->personaname }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
