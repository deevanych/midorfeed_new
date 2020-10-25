<!doctype html>
<html lang="en">
<head>
    @include('layouts/head')
</head>
<body class="container">
<div id="app">
    <x-header></x-header>
    @yield('content')
</div>
</body>
<script src="{{ mix('/js/app.js') }}"></script>
<script src="https://player.twitch.tv/js/embed/v1.js"></script>
</html>
