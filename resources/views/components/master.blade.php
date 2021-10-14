<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/image-reader.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
<div id="app">
    {{ $slot }}
</div>
<script src="{{asset('js/like-comment.js')}}"></script>
<script src="{{asset('js/image-reader.js')}}"></script>
<script src="{{asset('js/modal-alert.js')}}"></script>
@stack('scripts')
    <script>
        $(".comment-modal").on("click",function () {
            let tweetId = $(this).data('tweetId')
            let imgPath = $(this).data('img');
            let name = $(this).data('name');
            let username = $(this).data('username');
            let time = $(this).data('time');
            let body = $(this).data('body');
            $("#commentImg").attr('src',imgPath);
            $("#realName").text(name);
            $("#userName").text('@'+username+' - ');
            $("#createdAt").text(time);
            $("#userBody").text(body);
            $('#modalForm').attr('action','/tweets/'+tweetId+'/comment');
        });
    </script>
</body>
</html>
