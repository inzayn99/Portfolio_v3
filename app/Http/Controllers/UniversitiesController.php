<?php

namespace App\Http\Controllers;

use App\Models\Universities;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UniversitiesController extends Controller
{

    public function index()
    {
        $universities = Universities::latest()->paginate(100);
        return view('backend.universities.index', compact('universities'));
    }

    public function create()
    {
        return view('backend.universities.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'banner_img'  => 'nullable|string|max:250',
            'cover_img'   => 'nullable|string|max:250',
            'icon'        => 'nullable|string|max:250',
            'name'        => 'required',
            'description' => 'required',
        ]);
        // $image = $request->cover_image;
        // $explode = explode($image, )
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);
        $input['publish_status']= $request->publish_status??0;
        Universities::create($input);
        return redirect()->route('universities.index')->with('success', 'University is Saved successfully.');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
{
    $universities = Universities::findOrFail($id);
    return view('backend.universities.create', compact('universities'));
}


    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cover_img'    => 'nullable|string|max:250',
            'banner_img'   => 'nullable|string|max:250',
            'icon'         => 'nullable|string|max:250',
            'name'        => 'required',
            'description'  => 'required',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->name);
        $input['publish_status']= $request->publish_status??0;
        Universities::findOrFail($id)->update($input);
        return redirect()->route('universities.index')->with('success', 'University updated successfully.');
    }

    public function destroy(string $id)
    {
        $university = Universities::findOrFail($id);
        $university->delete();
        return response()->json(['success' => true, 'message' => 'University Data deleted successfully.']);
    }
}
