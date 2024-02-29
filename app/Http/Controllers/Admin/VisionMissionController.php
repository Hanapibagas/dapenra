<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class VisionMissionController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $vissionMission = VisionMission::query();
            return DataTables::of($vissionMission)->editColumn('name', function ($vissionMission) {
                return str_replace('@', '@', $vissionMission->name);
            })->rawColumns(['name'])->make(true);
        }

        return view('admin.vission-mission.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        VisionMission::create($request->all());
    }

    public function edit($id)
    {
        $vissionMission = VisionMission::findOrFail($id);
        return response()->json([
            "data" => $vissionMission,
        ]);
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $vissionMission = VisionMission::findOrFail($id);
        $vissionMission->update([
            "name" => $request->input("name")
        ]);
    }

    public function destroy($id)
    {
        $vissionMission = VisionMission::findOrFail($id);
        $vissionMission->delete();
    }
}
