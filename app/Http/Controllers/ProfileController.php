<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfileForm() {
        if (auth()->check()) {
            return view('page.profile')->with('showHeader', false);            
        } else {
            return redirect('/');
        }
    }
    public function mainopen() {
        if (auth()->check()) {
            $users = User::find(auth()->user()->id);
            return view('page.profile', compact('users'));
        }
        return;
    }
}
