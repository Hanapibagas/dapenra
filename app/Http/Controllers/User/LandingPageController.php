<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Tour;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $activity = Activity::orderBy('id', 'DESC')->limit(3)->get();
        $tour = Tour::orderBy('id', 'DESC')->limit(3)->get();
        return view('frontend.master', compact('activity', 'tour'));
    }
}
