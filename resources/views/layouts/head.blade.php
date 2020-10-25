<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield('title', 'Новости, стримы, видео, гайды') | midorfeed | dota 2</title>
<meta name='description' content='@yield('description', 'Сеть игроков в дота 2. Тут вы можете посмотреть новости со всех сайтов, вступать в тематические сообщества, общаться со своими друзьями, смотреть стримы.')'/>
<meta name='keywords' content='@yield('keywords', 'dota 2, dota 2 обновление, dota 2 гайды, dota2, dota market, dota, дота 2, дота патч, дота обновление, обновление дота 2, герои доты')'/>
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel='apple-touch-icon' sizes='180x180' href='{{ asset('images/favicon/apple-touch-icon.png') }}'>
<link rel='icon' type='image/png' sizes='32x32' href='{{ asset('images/favicon/favicon-32x32.png') }}'>
<link rel='icon' type='image/png' sizes='16x16' href='{{ asset('images/favicon/favicon-16x16.png') }}'>
<link rel='mask-icon' href='{{ asset('images/favicon/safari-pinned-tab.svg') }}' color='#5bbad5'>
<link rel='manifest' href='{{ asset('manifest.json') }}'>
<meta name='mobile-web-app-capable' content='yes'>
<meta name='apple-mobile-web-app-capable' content='yes'>
<meta name='application-name' content='midorfeed.ru'>
<meta name='apple-mobile-web-app-title' content='midORfeed.ru'>
<meta name='theme-color' content='#673ab7'>
<meta name='msapplication-navbutton-color' content='#673ab7'>
<meta name='apple-mobile-web-app-status-bar-style' content='black-translucent'>
<meta name='msapplication-starturl' content='/'>
<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
<meta name='msapplication-TileColor' content='#da532c'>
<meta name='theme-color' content='#673ab7'/>

<meta property='og:url' content='{{ url()->current() }}'>
<meta property='og:locale' content='ru_RU'>
<meta property='og:type' content='website'>
<meta property='og:title' content='@yield('title', 'Новости, стримы, видео, гайды') | midorfeed | dota 2'>
<meta property='og:description' content='@yield('description', 'Сеть игроков в дота 2. Тут вы можете посмотреть новости со всех сайтов, вступать в тематические сообщества, общаться со своими друзьями, смотреть стримы.')'>
<meta property='og:image' content='@yield('image', asset('/images/site_logo.jpg'))'>
<meta property='og:site_name' content='midorfeed.ru' />

<meta property="twitter:card" content="summary_large_image"/>
<meta property="twitter:site" content="@midorfeed_ru"/>
<meta property="twitter:title" content='@yield('title', 'Новости, стримы, видео, гайды') | midorfeed | dota 2'>
<meta property="twitter:description" content='@yield('description', 'Сеть игроков в дота 2. Тут вы можете посмотреть новости со всех сайтов, вступать в тематические сообщества, общаться со своими друзьями, смотреть стримы.')'>
<meta property="twitter:creator" content="@midorfeed_ru"/>
<meta property="twitter:image" content='@yield('image', asset('/images/site_logo.jpg'))'>
<meta property="twitter:domain" content="midorfeed.ru"/>

<link rel="stylesheet" href="{{ mix('/css/main.css') }}">
