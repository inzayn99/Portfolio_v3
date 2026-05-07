<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ScholarshipController extends Controller
{

    public function index()
    {
        $scholar = Scholarship::latest()->paginate(100);
        return view('backend.scholarship.index', compact('scholar'));
    }

    public function create()
    {
           return view('backend.scholarship.create');
    }

    public function store(Request $request)
    {
         // dd($request->all());
         $this->validate($request, [
            'cover_image'    => 'nullable|string|max:250',
            // 'banner_image'   => 'nullable|string|max:250',
            'title'          => 'required',
            'city'    => 'nullable',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Scholarship::create($input);

        return redirect()->route('scholarship-post.index')->with('success', 'Created successfully.');
    }


    public function edit(string $id)
    {
        $scholar = Scholarship::findorFail($id);
        return view('backend.scholarship.create', compact('scholar'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cover_image'    => 'nullable|string|max:250',
            // 'banner_image'   => 'nullable|string|max:250',
            'title'          => 'required',
            'description'    => 'nullable',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Scholarship::findOrFail($id)->update($input);
        return redirect()->route('scholarship-post.index')->with('success', 'Updated successfully.');
    }


    public function destroy(string $id)
    {
        $scholar = Scholarship::findOrFail($id);
        $scholar->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
