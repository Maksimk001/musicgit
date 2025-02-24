<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Storage;
use getID3;
class MySongController extends Controller
{
    public function showMySongForm() {
        if (auth()->check()) {
            return view('page.mysong')->with('showHeader', true);
        } else {
            return view('auth.login')->with('showHeader', false);
        }
    }
    public function index() {
        if (auth()->check()) {
            $number = 1;
            $showHeader = true;
            $songs = Song::where('author', auth()->user()->name)->get();
    
            return view('page.mysong', compact('songs', 'number', 'showHeader'));
        } else {
            return view('auth.login')->with('showHeader', false);
        }
        
    }

    public function store(Request $request)
    {
        $null = 0;
        $musicFile = '';
        $imageFile = '';
        $userId = auth()->user()->id;

        // Валидация
        $request->validate([
            'music_path' => 'required|file|mimes:mp3',
            'name' => 'required|string', 
            'image_path' => 'required|file|mimes:png,jpg,jpeg',
        ]);

        // Сохранение mp3
        if ($request->file('music_path')->isValid()) {
            $fileToPuthMusic = public_path("music/{$userId}/mp3");

            if (!file_exists($fileToPuthMusic)) {
                mkdir($fileToPuthMusic, 0755, true);
            }

            $fileName = time() . '.' . $request->file('music_path')->getClientOriginalExtension();
            $request->file('music_path')->move($fileToPuthMusic, $fileName);
            $musicFile = "music/{$userId}/mp3/" . $fileName;

            $getID3 = new getID3();
            $fileInfo = $getID3->analyze($fileToPuthMusic . '/' . $fileName);
    
            $duration = $fileInfo['playtime_seconds'] ?? 0;

            if ($request->file('image_path')->isValid()) {
                $fileToPuthMusic = public_path("music/{$userId}/img");
    
                if (!file_exists($fileToPuthMusic)) {
                    mkdir($fileToPuthMusic, 0755, true);
                }
    
                $fileName = time() . '.' . $request->file('image_path')->getClientOriginalExtension();
                $request->file('image_path')->move($fileToPuthMusic, $fileName);
                $imageFile = "music/{$userId}/img/" . $fileName;
            }
            
            Song::create([
                'music_path' => $musicFile,
                'image_path' => $imageFile,
                'name' => $request->name,
                'author' => auth()->user()->name,
                'like' => $null,
                'listen' => $null,
                'download' => $null,
                'duration' => $duration,
            ]);
            return back()->with('success', 'Файл загружен: ' . $fileName);
        }

        return back()->withErrors('Ошибка загрузки файла');
    }

    public function destroy($id)
    {
        $song = Song::find($id);
        $image_path = $song->image_path;
        $music_path = $song->music_path;
        if ($song) {
            unlink($image_path);
            unlink($music_path);
            $song->delete();
            return redirect('page/mysong');
        }

        return redirect('page/mysong');
    }
}
