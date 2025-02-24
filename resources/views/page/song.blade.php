@extends('layouts.app')
@section('content')
<title>Все песни</title>

<div class="chartwindow">
    <h1 class="animeHeader">Songs</h1>
    <div class="songschart">
        @foreach ($songs as $index => $song)
        <div class="song" id="songblock">
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
                    @method('DELETE')
                    <button type="submit" class="btn-2">
                        <img src="{{ asset('image/like.svg') }}" alt="">
                    </button>
                </form>
            </div>
            <div class="time">{{ $song->duration }}</div>
        </div>
        @endforeach
    </div>
    
</div>
<script>
    const songs = @json($songs);
</script>
@endsection