<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationsController extends Controller
{
    public function index()
    {
        $destinations = Destinations::latest()->paginate(100);
        return view('backend.destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('backend.destinations.create');
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
        Destinations::create($input);
        return redirect()->route('destinations.index')->with('success', 'Destinations Saved successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $destinations = Destinations::findOrFail($id);
    return view('backend.destinations.create', compact('destinations'));
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
        Destinations::findOrFail($id)->update($input);
        return redirect()->route('destinations.index')->with('success', 'Destinations updated successfully.');
    }

    public function destroy(string $id)
    {
        $destinations = Destinations::findOrFail($id);
        $destinations->delete();
        return response()->json(['success' => true, 'message' => 'Destinations Data deleted successfully.']);
    }
}
