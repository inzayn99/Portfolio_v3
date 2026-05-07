<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Clients::latest()->paginate(100);

        return view('backend.clients.index',compact('clients'));
    }

    public function create()
    {
        return view('backend.clients.create');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'link' => 'nullable|string',
            'title'    => 'required',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Clients::create($input);
        return redirect()->route('clients.index')->with('success', 'Clients Data is created successfully.');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $clients = Clients::findorFail($id);
        return view('backend.clients.create', compact('clients'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title'    => 'required',
            'cover_image' => 'nullable|string|max:250',
            'link' => 'nullable|string|max:250',

            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Clients::findOrFail($id)->update($input);
        return redirect()->route('clients.index')->with('success', 'Updated successfully.');
    }

    public function destroy(string $id)
    {
        $clients = Clients::findOrFail($id);
        $clients->delete();

        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
