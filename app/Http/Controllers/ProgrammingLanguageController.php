<?php

namespace App\Http\Controllers;

use App\Models\ProgrammingLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgrammingLanguageController extends Controller
{

     public function index()
    {
        $language = ProgrammingLanguage::latest()->get();
        return view('backend.programming-language.index', compact('language'));
    }


    public function create()
    {
        return view('backend.programming-language.create');
    }


     public function store(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required',
            'publish_status'=>'nullable'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        ProgrammingLanguage::create($input);

        return redirect()->route('programming-language.index')->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        $language = ProgrammingLanguage::findorFail($id);
        return view('backend.programming-language.create', compact('language'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'    => 'required',
            'publish_status'=>'nullable'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        ProgrammingLanguage::findOrFail($id)->update($input);
        return redirect()->route('programming-language.index')->with('success', 'Updated successfully.');
    }


     public function destroy($id)
    {
        $language = ProgrammingLanguage::findOrFail($id);
        $language->delete();

        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
