<?php

namespace App\Http\Controllers;
use App\Models\Song;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        $songs = Song::orderBy('download', 'desc')->limit(5)->get();
        $showHeader = true;
        $number = 1;
        
        return view('Welcome', compact('songs', 'number', 'showHeader'));
    }
}
