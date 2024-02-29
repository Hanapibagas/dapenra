<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomeSpeech;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;


class WelcomeSpeechController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $welcomeSpeech = WelcomeSpeech::query();
            return DataTables::of($welcomeSpeech)->editColumn('image', function ($welcomeSpeech) {
                if ($welcomeSpeech->image) {
                    $image = asset("storage/" . $welcomeSpeech->image);
                    return '<img width="100px" height="100px" src="' . $image . '" alt="Image Welcome Speech">';
                } else {
                    return 'No picture';
                }
            })->editColumn('content', function ($welcomeSpeech) {
                return str_replace('@', '@', $welcomeSpeech->content);
            })->rawColumns(['image', 'content'])->make(true);
        }

        return view('admin.welcome-speech.index');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'content' => 'required|string',
            'image' => 'required',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image')->store('image/welcome-speech', 'public');
        }

        WelcomeSpeech::create([
            "image" => $image,
            "name" => $request->input('name'),
            "content" => $request->input('content'),
        ]);
    }

    public function edit($id)
    {
        $welcomeSpeech = WelcomeSpeech::findOrFail($id);

        if ($welcomeSpeech->image) {
            $image = asset("storage/" . $welcomeSpeech->image);
        }
        return response()->json([
            "data" => $welcomeSpeech,
            "image" => $image ?? ""
        ]);
    }

    public function  update(Request $request)
    {

        $welcomeSpeech = WelcomeSpeech::where('id', $request->get('id'))->first();
        if ($request->file('image')) {
            if ($welcomeSpeech->image && file_exists(storage_path('app/public/' . $welcomeSpeech->image))) {
                Storage::delete('public/' . $welcomeSpeech->image);
                $image = $request->file('image')->store('image/welcome-speech', 'public');
            }
        }

        if ($request->file('image') === null) {
            $image = $welcomeSpeech->image;
        }

        $welcomeSpeech->update([
            "image" => $image,
            "name" => $request->input('name'),
            "content" => $request->input('content'),
        ]);
    }

    public function destroy($id)
    {

        $welcomeSpeech = WelcomeSpeech::findOrFail($id);
        if ($welcomeSpeech->image && file_exists(storage_path('app/public/' . $welcomeSpeech->image))) {
            Storage::delete('public/' . $welcomeSpeech->image);
        }
        $welcomeSpeech->delete();
    }
}
