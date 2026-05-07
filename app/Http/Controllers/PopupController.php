<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PopupController extends Controller
{
    public function index()
    {
        $popups = Popup::latest()->paginate(100);
        return view('backend.popup.index', compact('popups'));
    }

    public function create()
    {
        return view('backend.popup.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'    => 'nullable',
            // 'description'    => 'nullable',
            'image' => 'required|string|max:250',
            'publish_status'=>'nullable',
            'link'=>'nullable',
            'show_on'=>'required'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        // $input['slug'] = Str::slug($request->title);
        Popup::create($input);

        return redirect()->route('popup.index')->with('success', 'Popup Image is created successfully.');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $popup = Popup::findorFail($id);
        return view('backend.popup.create', compact('popup'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'    => 'nullable',
            // 'description'    => 'nullable',
            'image' => 'required|string|max:250',
            'publish_status'=>'nullable',
            'link'=>'nullable',
            'show_on'=>'required'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        // $input['slug'] = Str::slug($request->title);
        Popup::findOrFail($id)->update($input);
        return redirect()->route('popup.index')->with('success', 'Popup has been updated successfully.');
    }


    public function destroy($id)
    {
        $Popups = Popup::findOrFail($id);
        $Popups->delete();

        return response()->json(['success' => true, 'message' => 'Popup deleted successfully.']);
    }
}
