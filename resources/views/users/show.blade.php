@extends('layouts.main')

@section('title', $user->personaname)
@section('description', $user->personaname)
@section('image', asset($user->avatar_url))

@section('content')
    <div class="row user-profile">
        <div class="col-9">
            <div class="row mb-4">
                <div class="col">
                    <div class="user-profile__header" style="background-image: url('{{ $user->profile->getImage() }}')">
                        <div class="row">
                            <div class="col">
                                <div class="user-profile__header-spacing"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="user-profile__header__user">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="user-profile__header__user-info">
                                                        <div class="col">
                                                            <div class="user-profile__header__user-info__avatar"
                                                                 style="background-image: url('{{ asset($user->avatar_url) }}')"></div>
                                                            <div class="avatar-spacer"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="user-profile__header__user-info__header">
                                                                <h1 class="user-profile__header__user-info__nickname">
                                                                    {{ $user->personaname }}
                                                                </h1>
                                                                <div class="user-profile__header__user-info__status">
                                                                    Предпочитаю какать стоя 🤣
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <nav class="nav nav-pills nav-fill user-profile__nav">
                                                        <a class="nav-item nav-link active" href="#">Лента</a>
                                                        <a class="nav-item nav-link" href="#">Медиа</a>
                                                        <a class="nav-item nav-link" href="#">Матчи</a>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <post-form/>
                </div>
            </div>
        </div>
        <div class="col">
            weq
        </div>
    </div>
@endsection
