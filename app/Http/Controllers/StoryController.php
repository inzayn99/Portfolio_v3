<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    public function index()
    {
        $story = Story::latest()->paginate(100);
        return view('backend.story.index', compact('story'));
    }

    public function create()
    {
         return view('backend.story.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'cover_image'    => 'required|string|max:250',
            'title'          => 'required',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Story::create($input);

        return redirect()->route('story.index')->with('success', 'Created successfully.');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $story = Story::findorFail($id);
        return view('backend.story.create', compact('story'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cover_image'    => 'nullable|string|max:250',
            'title'          => 'required',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Story::findOrFail($id)->update($input);
        return redirect()->route('story.index')->with('success', 'Updated successfully.');
    }

    public function destroy(string $id)
    {
        $story = Story::findOrFail($id);
        $story->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
