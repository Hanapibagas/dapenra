<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TourController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tour = Tour::query();
            return DataTables::of($tour)->editColumn('image', function ($tour) {
                if ($tour->image) {
                    $image = asset("storage/" . $tour->image);
                    return '<img width="100px" height="100px" src="' . $image . '" alt="Image Welcome Speech">';
                } else {
                    return 'No picture';
                }
            })->editColumn('description', function ($tour) {
                return str_replace('@', '@', $tour->description);
            })->rawColumns(['image', 'description'])->make(true);
        }
        return view('admin.tour.index');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image')->store('image/tour', 'public');
        }

        Tour::create([
            "image" => $image,
            "name" => $request->input('name'),
            "description" => $request->input('description'),
        ]);
    }

    public function edit($id)
    {
        $tour = Tour::findOrFail($id);

        if ($tour->image) {
            $image = asset("storage/" . $tour->image);
        }
        return response()->json([
            "data" => $tour,
            "image" => $image ?? ""
        ]);
    }

    public function  update(Request $request)
    {

        $tour = Tour::where('id', $request->get('id'))->first();
        if ($request->file('image')) {
            if ($tour->image && file_exists(storage_path('app/public/' . $tour->image))) {
                Storage::delete('public/' . $tour->image);
                $image = $request->file('image')->store('image/tour', 'public');
            }
        }

        if ($request->file('image') === null) {
            $image = $tour->image;
        }

        $tour->update([
            "image" => $image,
            "name" => $request->input('name'),
            "description" => $request->input('description'),
        ]);
    }

    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        if ($tour->image && file_exists(storage_path('app/public/' . $tour->image))) {
            Storage::delete('public/' . $tour->image);
        }
        $tour->delete();
    }
}
