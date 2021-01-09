@extends('layouts.main')

@section('title', 'Поиск игроков')

@section('content')
    <x-page-title title="Поиск команды" description="Заявки на совместную игру"/>
    <div class="row">
        <div class="col-9">
            <div class="row">
                @foreach($orders as $order)
                    <div class="col-4 mb-4">
                        <a class="find-order__item text-dark" href="{{ route('teammates.show', $order->id) }}">
                    <span class="find-order__item-image"
                          style="background-image: url({{ $order->user->avatar_url }})"></span>
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
                        <span class="find-order__item-text">
                            {{ $order->getText(200) }}
                        </span>
                                <span>Обновлено {{ $order->getTranslatedDate() }}</span>
                    </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{ $orders->links() }}
@endsection
