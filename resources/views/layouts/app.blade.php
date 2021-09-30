<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <section class="px-8 py-3">
        <header class="container mx-auto">
            <div class="flex">
                <img class="w-10 h-auto flex-initial" src="{{asset('images/twitter_bird_logo.png')}}" alt="Tweety"/>
               <h1 class="text-2xl font-bold pl-1">Tweety</h1>
            </div>
        </header>
    </section>

    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                <div class="lg:w-1/6">
                    @include('_sidebar-links')
                </div>
                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px;">
                    @yield('content')
                </div>
                <div class="lg:w-1/6 bg-gray-100 rounded-lg p-4">
                    @include('_friends_list')
                </div>
            </div>
        </main>
    </section>
</div>
</body>
</html>
