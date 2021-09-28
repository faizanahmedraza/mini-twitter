<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
<div class="relative flex justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:pt-0">
            <p class="text-6xl">Tweety</p>
        </div>

        <div class="flex justify-center mt-4 sm:items-center sm:justify-center">
            <div class="text-center text-sm text-gray-500 sm:text-left">
                <div class="py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}"
                           class="text-lg text-gray-700 dark:text-gray-500 hover:underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-lg text-gray-700 dark:text-gray-500 hover:underline">Log
                            in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="ml-4 text-lg text-gray-700 dark:text-gray-500 hover:underline">Register</a>
                        @endif
                    @endauth
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
