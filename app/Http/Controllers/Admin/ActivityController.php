<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;



class ActivityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $activity = Activity::query();
            return DataTables::of($activity)->editColumn('content', function ($activity) {
                return str_replace('@', '@', $activity->content);
            })->editColumn('image', function ($activity) {
                if ($activity->image) {
                    $image = asset("storage/" . $activity->image);
                    return '<img width="100px" height="100px" src="' . $image . '" alt="Image Activity">';
                } else {
                    return 'No picture';
                }
            })->rawColumns(['content', 'image'])->make(true);
        }
        return view('admin.activity.index');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image')->store('image/activity', 'public');
        }

        $slug = Str::slug($request->input('title'), '-');

        Activity::create([
            "image" => $image,
            "title" => $request->input('title'),
            "content" => $request->input('content'),
            "slug" => $slug,
        ]);
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);

        if ($activity->image) {
            $image = asset("storage/" . $activity->image);
        }
        return response()->json([
            "data" => $activity,
            "image" => $image ?? ""
        ]);
    }

    public function  update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $activity = Activity::where('id', $request->get('id'))->first();
        if ($request->file('image')) {
            if ($activity->image && file_exists(storage_path('app/public/' . $activity->image))) {
                Storage::delete('public/' . $activity->image);
                $image = $request->file('image')->store('image/activity', 'public');
            }
        }

        if ($request->file('image') === null) {
            $image = $activity->image;
        }

        $slug = Str::slug($request->input('title'), '-');

        $activity->update([
            "image" => $image,
            "title" => $request->input('title'),
            "content" => $request->input('content'),
            "slug" => $slug,
        ]);
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        if ($activity->image && file_exists(storage_path('app/public/' . $activity->image))) {
            Storage::delete('public/' . $activity->image);
        }
        $activity->delete();
    }
}
