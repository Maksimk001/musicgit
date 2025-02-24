<?php

namespace App\Http\Controllers;
use App\Models\Song;
use App\Models\User;

use Illuminate\Http\Request;
use Storage;

class SongController extends Controller
{
    public function showSongForm() {
        return view('page.song')->with('showHeader', true);
    }
    public function index() {
        $number = 1;
        $songs = Song::All();
        $showHeader = true;

        return view('page.song', compact('songs', 'number', 'showHeader'));
    }

    public function download($id) {
        $song = Song::find($id);
        $filePath = $song->music_path;

        $downloadPath = $song->author;

        if (file_exists($filePath)) {
            $song->increment('download');
            $user = User::where('name', $downloadPath);
            $user->increment('download');

            return response()->download($filePath, $song->name . '.mp3');
        } else {
            return response()->json(['message' => 'Файл не найден.'], 404);
        }
    }

    public function incrementListen($id)
    {
        $song = Song::findOrFail($id);
        $song->increment('listen');

        $listenpath = $song->author;
        $user = User::where('name', $listenpath);
        $user->increment('listen');

        return response()->json(['success', 'add']);
    }
}