<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $notice = Notice::latest()->paginate(100);
        return view('backend.notice.index', compact('notice'));
    }

    public function create()
    {
        return view('backend.notice.create');

    }

    public function store(Request $request)
    {
         // return $request->all();
         $this->validate($request, [
            'cover_image'   => 'nullable|string|max:250',
            'banner_image'  => 'nullable|string|max:250',
            'title'         => 'required',
            'posted_by'     => 'nullable',
            'description'   => 'required',
            'meta_title'    => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
            'og_image'      => 'nullable|string|max:250',
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Notice::create($input);
        return redirect()->route('notice.index')->with('Created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $notice = Notice::findorFail($id);
        return view('backend.notice.create', compact('notice'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cover_image'      => 'nullable|string|max:250',
            'banner_image'     => 'nullable|string|max:250',
            'title'            => 'required',
            'description'      => 'required',
            'meta_title'       => 'nullable',
            'meta_keywords'    => 'nullable',
            'meta_description' => 'nullable',
            'og_image'         => 'nullable|string|max:250',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Notice::findOrFail($id)->update($input);
        return redirect()->route('notice.index')->with('success', 'Updated successfully.');
    }

    public function destroy(string $id)
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
