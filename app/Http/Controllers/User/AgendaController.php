<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::all();
        return view('user.agenda', compact('agenda'));
    }
}
