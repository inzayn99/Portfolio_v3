<?php

namespace App\Http\Controllers;

use App\Models\Partners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    public function index()
    {
        $partners = Partners::latest()->paginate(200);
        return view('backend.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('backend.partners.create');
    }

    public function store(Request $request)
    {
         // dd(gettype($request->slider_image));
         $this->validate($request, [
            'title'=>'required|max:200',
            'url'=>'nullable',
            'partner_image' => 'required|string|max:250',
            'publish_status' => 'nullable'
        ]);

        $input = $request->all();
        $input['publish_status']= $request->publish_status??0;
        $input['top_partner'] =$request->top_partner ?? 0;

        Partners::create($input);
        return redirect()->route('partners.index')->with('success', 'partner is created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $partners = Partners::findorFail($id);
        return view('backend.partners.create', compact('partners'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'nullable|max:200',
            'url'=>'nullable',
            'partner_image' => 'nullable|string|max:250',
            'publish_status' => 'nullable'
        ]);
        $input = $request->all();
        // $input['location'] = $request->partners_image;
        $input['publish_status']= $request->publish_status??0;
        $input['top_partner'] =$request->top_partner ?? 0;

        Partners::findOrFail($id)->update($input);
        return redirect()->route('partners.index')->with('success', 'Partners is updated successfully.');
    }

    public function destroy($id)
    {
        $partners = Partners::findOrFail($id);
        $partners->delete();

        return response()->json(['success' => true, 'message' => 'Partner deleted successfully.']);
    }
}
