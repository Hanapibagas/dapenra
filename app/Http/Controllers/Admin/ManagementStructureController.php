<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManagementStructure;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;



class ManagementStructureController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $managementStructure = ManagementStructure::query();
            return DataTables::of($managementStructure)->editColumn('image', function ($managementStructure) {
                if ($managementStructure->image) {
                    $image = asset("storage/" . $managementStructure->image);
                    return '<img width="100px" height="100px" src="' . $image . '" alt="Image Management Structure">';
                } else {
                    return 'No picture';
                }
            })
                ->rawColumns(['image'])
                ->make(true);
        }

        return view('admin.management-structure.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image')->store('image/management-structure', 'public');
        }

        ManagementStructure::create([
            "image" => $image
        ]);
    }

    public function edit($id)
    {
        $managementStructure = ManagementStructure::findOrFail($id);

        if ($managementStructure->image) {
            $image = asset("storage/" . $managementStructure->image);
        }
        return response()->json([
            "data" => $managementStructure,
            "image" => $image ?? ""
        ]);
    }

    public function  update(Request $request)
    {

        $managementStructure = ManagementStructure::where('id', $request->get('id'))->first();
        if ($request->file('image')) {
            if ($managementStructure->image && file_exists(storage_path('app/public/' . $managementStructure->image))) {
                Storage::delete('public/' . $managementStructure->image);
                $file = $request->file('image')->store('image/management-structure', 'public');
            }
        }

        if ($request->file('image') === null) {
            $file = $managementStructure->image;
        }

        $managementStructure->update([
            "image" => $file,
        ]);
    }


    public function destroy($id)
    {

        $managementStructure = ManagementStructure::findOrFail($id);
        if ($managementStructure->image && file_exists(storage_path('app/public/' . $managementStructure->image))) {
            Storage::delete('public/' . $managementStructure->image);
        }
        $managementStructure->delete();
    }
}
