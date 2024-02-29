<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ManagementStructure;
use Illuminate\Http\Request;

class ManagementStructureController extends Controller
{
    public function index()
    {
        $managementStructure = ManagementStructure::first();
        return view('user.management-structure', compact('managementStructure'));
    }
}
