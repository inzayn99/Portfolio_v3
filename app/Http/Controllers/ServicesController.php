<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Services::latest()->paginate(100);
        return view('backend.services.index', compact('services'));
    }


    public function create()
    {
          // dd('dsdsd');
          return view('backend.services.create');
    }

    public function store(Request $request)
    {
          // dd($request->all());
          $this->validate($request, [
            'cover_image'    => 'nullable|string|max:250',
            'banner_image'   => 'nullable|string|max:250',
            'title'          => 'required',
            'description'    => 'required',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Services::create($input);

        return redirect()->route('services.index')->with('success', 'Created successfully.');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $services = Services::findorFail($id);
        return view('backend.services.create', compact('services'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cover_image'    => 'nullable|string|max:250',
            'banner_image'   => 'nullable|string|max:250',
            'title'          => 'required',
            'description'    => 'required',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Services::findOrFail($id)->update($input);
        return redirect()->route('services.index')->with('success', 'Updated successfully.');
    }

    public function destroy(string $id)
    {
        $services = Services::findOrFail($id);
        $services->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
