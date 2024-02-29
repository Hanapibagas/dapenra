<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activity = Activity::orderBy('id', 'DESC')->paginate(5);
        $recentActivity = Activity::orderBy('id', 'DESC')->limit(3)->get();
        return view('user.activity', compact('activity', 'recentActivity'));
    }

    public function detailActivity($slug)
    {
        $detailActivity = Activity::where('slug', $slug)->first();
        $recentActivity = Activity::orderBy('id', 'DESC')->limit(3)->get();
        return view('user.detail-activity', compact('detailActivity', 'recentActivity'));
    }
}
