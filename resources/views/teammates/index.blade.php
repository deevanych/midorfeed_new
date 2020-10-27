@extends('layouts.main')

@section('title', 'Поиск игроков')

@section('content')
    <x-page-title title="Поиск команды" description="Заявки на совместную игру"/>
    <div class="row">
        <div class="col-7">
            @foreach($orders as $order)
                <div class="row">
                    <div class="col find-order__item" style="background-image: url("{{ asset(Storage::url('avatars/'.$order->user->steamid.'.jpg'))  }}")">
                        {{ $order->user->personaname }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
