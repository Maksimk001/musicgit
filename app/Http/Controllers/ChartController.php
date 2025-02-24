<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class ChartController extends Controller
{
    public function showChartForm() {
        return view(view: 'page.chart')->with('showHeader', true);   
    }
    public function index() {
        $songs = Song::orderBy('download', 'desc')->limit(50)->get();
        $showHeader = true;
        $number = 1;
        
        return view('page.chart', compact('songs', 'number', 'showHeader'));
    }
    
}
