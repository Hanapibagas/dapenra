<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('user.about', compact('about'));
    }
}
