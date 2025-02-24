@extends('layouts.app')
@section('content')
<title>Песни {{ auth()->user()->name }}</title>

<div class="fon">
    <div class="windows">
        <form action="{{ route('song.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>New Song</h1>
            <div class="inp">
                <label>Обложка</label>
                <input type="file" name="image_path" id="image_path" accept="image/*" required>
            </div>
            <div class="inp">
                <label>Название</label>
                <input type="text" class="inp-1" name="name" required>
            </div>

            <div class="inp">
                <label>Автор</label>
                <p>{{ auth()->user()->name }}</p>
            </div>

            <div class="inp">
                <label>Файл</label>
                <input type="file" name="music_path" accept=".mp3" required>
            </div>
            <button type="submit" class="btn-1">Upload</button>
            <button type="text" class="btn-1" id="close">Close</button>
        </form>
    </div>
    
</div>

<div class="chartwindow">
    <h1 class="animeHeader">Songs - {{ auth()->user()->name }}</h1>
    <div class="songschart">
        <div class="buttonmenu" id="dsd">
            <button class="btn-1" id="butmn">Add New Song</button>
        </div>

        @if ($songs->isEmpty())
            <h1 style="text-align: center; font-size: 40px;">Тут пусто, время добавить что-то новое!</h1>
        @else
        @foreach ($songs as $index => $song)
        <div class="song">
            <div class="number">{{ $number++ }}</div>
            <div class="img"><img src="{{ asset($song->image_path) }}" alt=""></div>
            <div class="name">
                <p>{{ $song->name }}</p>
                <p>{{ $song->author }}</p>
            </div>
            <div class="like">
                <form action="{{ route('mysongs.destroy', $song->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-2">
                        <img src="{{ asset('image/delete.svg') }}" alt="">
                    </button>
                </form>
            </div>
            <div class="time">22:11</div>
        </div>
        @endforeach
        @endif
        

        
        
    </div>
</div>

<script src="{{ asset('script/code.js') }}"></script>
<script>
    const songs = @json($songs);
</script>
@endsection