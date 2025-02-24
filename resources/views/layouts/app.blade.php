<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>
@if(isset($showHeader) && $showHeader)
<header>
    <div class="header">
        <div class="logo">
            <a href="/"><img src="{{ asset('image/logo.svg') }}" alt=""></a>
        </div>
        
        <div class="button">
            <a href="/page/chart">Chart</a>
            <a href="/page/song">Songs</a>
            <a href="/page/mysong">My Song</a>
            <a href="/page/mylike">My Favorite</a>
        </div>
        
        <div class="account">
            @if (auth()->check())
                <a href="{{ '/page/profile' }}"><button class="btn-1">Profile</button></a>
                <a href="{{ route('logout') }}"><button class="btn-1">Log out</button></a>
            @else
                <a href="{{ route('auth.login') }}"><button class="btn-1">Sing in</button></a>
                <a href="{{ route(name: 'auth.register') }}"><button class="btn-1">Sing up</button></a>
            @endif
        </div>
    </div>
</header>
@endif
<body>
    @error('errorH1')
    <div class="errorlist">
        <p class="errorText">{{ $message }}</p>
        <p class="errorText"></p>
        <div class="errorLineFon">
            <div class="errorLine"></div>
        </div>
    </div>
    @enderror
    

    @yield('content')

    <div class="backmedia">
        <div class="media">
            <div class="info">
                <div class="button">
                    <img id="music-start" src="{{ asset('image/pause.svg') }}" alt="">
                </div>
                <div class="img">
                    <img id="imagetrack" src="{{ asset('image/account.svg') }}" alt="">
                </div>
                <div class="name" id="minwid">
                    <p class="nametrack">Название</p>
                    <p class="authortrack">Автор</p>
                </div>
                <div class="time">
                    <p>00:00</p>
                    <p>/</p>
                    <p>01:11</p>
                </div>
            </div>
            
        </div>
    </div>
</body>


<script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
<script src="{{ asset('script/anim/animesong.js') }}"></script>
<script src="{{ asset('script/audio.js') }}"></script>
</html>