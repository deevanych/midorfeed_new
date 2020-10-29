@extends('layouts.main')

@section('title', 'Заявка '.$order->user->personaname)

@section('content')
    <x-page-title title="Заявка {{ $order->user->personaname }}" description="Заявки на совместную игру"/>
    <div class="row">
        <div class="col-9">
            <div class="find-order__item row">
                <div class="col-4">
                    <span class="find-order__item-image"
                          style="background-image: url({{ asset(Storage::url('avatars/'.$order->user->steamid.'.jpg')) }})"></span>
                </div>
                <div class="col-8">
                <span class="find-order__item-body">
                            <h3>{{ $order->user->personaname }}</h3>
                        <span class="find-order__item-meta">
                            <span data-toggle="tooltip"
                                  data-placement="bottom"
                                  title="Количество просмотров"
                                  data-original-title="Количество просмотров"><i
                                    class="far fa-eye"></i> {{ $order->views }}</span>
                        <span data-toggle="tooltip" data-placement="bottom" title="Комментарии"
                              data-original-title="Комментарии"><i
                                class="far fa-comment"></i> {{ $order->getCommentsCount() }}</span>
                            <span data-toggle="tooltip" data-placement="bottom" title="Рейтинг"
                                  data-original-title="Рейтинг">{{ $order->user->rating }}</span>
                            </span>
                                <span class="find-order__item-purposes">
                                    @foreach($order->purposes as $purpose)
                                        <span class="find-order__item-purpose" data-toggle="tooltip"
                                              data-placement="bottom" title="Цель"
                                              data-original-title="Цель">
                                            {{ $purpose->title }}
                                        </span>
                                    @endforeach
                                </span>

                                <span class="find-order__item-purposes">
                                    @foreach($order->user->roles as $role)
                                        <span class="find-order__item-purpose" data-toggle="tooltip"
                                              data-placement="bottom" title="Роль"
                                              data-original-title="Роль">
                                            {{ $role->title }}
                                        </span>
                                    @endforeach
                                </span>

                                <span class="find-order__item-purposes">
                                    <span class="find-order__item-purpose" data-toggle="tooltip"
                                          data-placement="bottom" title="Время игры"
                                          data-original-title="Время игры">
                                    {{ $order->getPrime() }}
                                    </span>
                                </span>
                        <span class="find-order__item-text">
                            {{ $order->getText() }}
                        </span>
                        <span>Обновлено {{ $order->getTranslatedDate() }}</span>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <comments/>
                </div>
            </div>
        </div>
    </div>
@endsection
