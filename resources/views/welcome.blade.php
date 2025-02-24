@extends('layouts.app')
@section('content')
<title>Главная</title>
<body>
    <div class="start">
        <img src="{{ asset('image/logo.svg') }}" alt="">
    </div>

    <div class="popular" id="#chart">
        <h1>The Best Beats!</h1>
        
        <div class="songschart">
            @foreach ($songs as $index => $song)
            <div class="song">
                <div class="number">{{ $number++ }}</div>
                <div class="img"><img src="{{ asset($song->image_path) }}" alt=""></div>
                <div class="name">
                    <p>{{ $song->name }}</p>
                    <p>{{ $song->author }}</p>
                </div>
                <div class="like">
                    <form action="{{ route('download', $song->id) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn-2">
                            <img src="{{ asset('image/dowland.svg') }}" alt="">
                        </button>
                    </form>
    
                    <form action="" method="">
                        @csrf
                        <button type="submit" class="btn-2">
                            <img src="{{ asset('image/like.svg') }}" alt="">
                        </button>
                    </form>
                </div>
                <div class="time">01:11</div>
            </div>
            @endforeach
        </div>
    </div>
</body>
@endsection