<?php

use App\Http\Controllers\MySongController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;

use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Http\Controllers\ChartController;

Route::delete('/mysongs/{id}', [MySongController::class, 'destroy'])->name('mysongs.destroy');
Route::post('song.store', [MySongController::class, 'store'])->name('song.store');
Route::get('/page/mysong', [MySongController::class, 'index']);
Route::get('/mysong', [MySongController::class, 'showMySongForm'])->name('mySong');





Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('auth.register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::get('auth.login', [AuthController::class, 'showLoginForm'])->name('auth.login');

Route::post('/song/increment-listen/{id}', [SongController::class, 'incrementListen']);
Route::get('/page/song', [SongController::class, 'index']);
Route::get('song', [SongController::class, 'showSongForm'])->name('song');
Route::get('/download/{id}', [SongController::class, 'download'])->name('download');


Route::get('/page/chart', [ChartController::class, 'index']);
Route::get('/chart', [ChartController::class, 'showChartForm'])->name('chart');


Route::get('/page/profile', [ProfileController::class, 'showProfileForm'])->name('page/profile');
Route::get('/page/profile', [ProfileController::class, 'mainopen']);

Route::get('/', [WelcomeController::class, 'index']);