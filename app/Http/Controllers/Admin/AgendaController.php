<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class AgendaController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $agenda = Agenda::query();
            return DataTables::of($agenda)->editColumn('start_date', function ($agenda) {
                return Carbon::parse($agenda->start_date)->isoFormat('D MMMM Y ');
            })->editColumn('end_date', function ($agenda) {
                return Carbon::parse($agenda->end_date)->isoFormat('D MMMM Y ');
            })->rawColumns(['start_date', 'end_date'])->make(true);
        }

        return view('admin.agenda.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Agenda::create($request->all());
    }

    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return response()->json([
            "data" => $agenda,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $agenda = Agenda::findOrFail($id);

        $agenda->update([
            "title" => $request->input('title'),
            "start_date" => $request->input('start_date'),
            "end_date" => $request->input('end_date'),
        ]);
    }

    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();
    }
}
