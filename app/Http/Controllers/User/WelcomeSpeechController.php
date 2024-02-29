<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\WelcomeSpeech;
use Illuminate\Http\Request;

class WelcomeSpeechController extends Controller
{
    public function index()
    {
        $welcomeSpeech = WelcomeSpeech::first();
        return view('user.welcome-speech', compact('welcomeSpeech'));
    }
}
