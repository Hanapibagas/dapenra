<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $tour = Tour::orderBy('id', 'DESC')->paginate(5);
        $recentTour = Tour::orderBy('id', 'DESC')->limit(3)->get();
        return view('user.tour', compact('tour', 'recentTour'));
    }

    public function detailTour($id)
    {
        $detailTour = Tour::where('id', $id)->first();
        $recentTour = Tour::orderBy('id', 'DESC')->limit(3)->get();
        return view('user.detail-tour', compact('detailTour', 'recentTour'));
    }
}
