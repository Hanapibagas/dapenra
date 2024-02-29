<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class AboutController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $about = About::query();
            return DataTables::of($about)->editColumn('content', function ($about) {
                return str_replace('@', '@', $about->content);
            })->rawColumns(['content'])->make(true);
        }

        return view('admin.about.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|string',
        ]);

        About::create($request->all());
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return response()->json([
            "data" => $about,
        ]);
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'content' => 'required|string',
        ]);

        $about = About::findOrFail($id);
        $about->update([
            "content" => $request->input("content")
        ]);
    }
}
