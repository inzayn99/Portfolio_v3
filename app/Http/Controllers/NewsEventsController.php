<?php

namespace App\Http\Controllers;

use App\Models\NewsEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsEventsController extends Controller
{
    public function index()
    {
        $news = NewsEvents::latest()->paginate(100);
        return view('backend.news.index', compact('news'));
    }


    public function create()
    {
        return view('backend.news.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'title'    => 'required',
            'posted_by'    => 'null',
            'description'    => 'required',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        NewsEvents::create($input);
        return redirect()->route('news-events.index')->with('Created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $news = NewsEvents::findorFail($id);
        return view('backend.news.create', compact('news'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'title'    => 'required',
            'description'    => 'required',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        NewsEvents::findOrFail($id)->update($input);
        return redirect()->route('news-events.index')->with('success', 'Updated successfully.');
    }

    public function destroy(string $id)
    {
        $news = NewsEvents::findOrFail($id);
        $news->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
