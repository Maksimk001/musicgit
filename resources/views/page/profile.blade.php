@extends('layouts.app')
@section('content')
<title>Профиль {{ auth()->user()->name }}</title>
    <div class="window" id="profileWindow">
        <h1 class="headProfile">Your Profile</h1>
        <div class="profile">
            <a href="{{ url()->previous() }}"><img class="back" src="{{ asset('image/Chevron_left.svg') }}" alt=""></a>
            <div class="splitwin">
                <div class="image">
                    <img src="{{ asset('image/account.svg') }}" alt="">
                </div>
            </div>
            <div class="splitwin">
                <p class="text">Information</p>
                <div class="input">
                    <p>Name</p>
                    <p>{{ auth()->user()->name }}</p>
                </div>
                <div class="input">
                    <p>Email</p>
                    <p>{{ auth()->user()->email }}</p>
                </div>

                <div class="yourstate">
                    <p class="text">State</p>
                    <div class="container">
                        <div class="b1"><img src="{{ asset('image/like.svg') }}" alt=""></div>
                        <div class="b1"><img src="{{ asset('image/note.svg') }}" alt=""></div>
                        <div class="b1"><img src="{{ asset('image/dowland.svg') }}" alt=""></div>
                        <div class="b1"></div>
                        <div class="b1">{{ $users->listen }}</div>
                        <div class="b1">{{ $users->download }}</div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
    <script src="{{ asset('script/anim/animeProfile.js') }}"></script>
@endsection