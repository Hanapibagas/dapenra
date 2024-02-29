<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;



class UmkmController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $umkm = Umkm::query();
            return DataTables::of($umkm)->editColumn('image', function ($umkm) {
                if ($umkm->image) {
                    $image = asset("storage/" . $umkm->image);
                    return '<img width="100px" height="100px" src="' . $image . '" alt="Image Umkm">';
                } else {
                    return 'No picture';
                }
            })->editColumn('description', function ($umkm) {
                return str_replace('@', '@', $umkm->description);
            })->rawColumns(['image', 'description'])->make(true);
        }
        return view('admin.umkm.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'address' => 'required',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image')->store('image/umkm', 'public');
        }

        Umkm::create([
            "image" => $image ?? "",
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "address" => $request->input('address'),
        ]);
    }

    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id);
        if ($umkm->image) {
            $image = asset("storage/" . $umkm->image);
        }
        return response()->json([
            "data" => $umkm,
            "image" => $image ?? ""
        ]);
    }

    public function  update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'address' => 'required',
        ]);

        $umkm = Umkm::where('id', $request->get('id'))->first();
        if ($request->file('image')) {
            $image = $request->file('image')->store('image/umkm', 'public');
            if ($umkm->image && file_exists(storage_path('app/public/' . $umkm->image))) {
                Storage::delete('public/' . $umkm->image);
                $image = $request->file('image')->store('image/umkm', 'public');
            }
        }

        if ($request->file('image') === null) {
            $image = $umkm->image;
        }

        $umkm->update([
            "image" => $image ?? "",
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "address" => $request->input('address'),
        ]);
    }

    public function destroy($id)
    {
        $umkm = Umkm::findOrFail($id);
        if ($umkm->image && file_exists(storage_path('app/public/' . $umkm->image))) {
            Storage::delete('public/' . $umkm->image);
        }
        $umkm->delete();
    }
}
