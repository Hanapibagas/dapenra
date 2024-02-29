<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    public function index()
    {
        $visionMission = VisionMission::first();
        return view('user.vision-mission', compact('visionMission'));
    }
}
