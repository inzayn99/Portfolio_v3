<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\faq;
use Illuminate\Support\Str;

class FaqController extends Controller
{
    public function index()
    {
        $faq = faq::latest()->paginate(200);
        return view('backend.faqs.index', compact('faq'));
    }

    public function create()
    {
        return view('backend.faqs.create');
    }


    public function store(Request $request)
    {
         $this->validate($request, [
            'question'=>'nullable|max:400',
            'answer'=>'nullable',
            'publish_status' => 'nullable'
        ]);

        $input = $request->all();
        $input['publish_status'] = $request->publish_status??0;
        faq::create($input);
        return redirect()->route('faq.index')->with('success', 'Created successfully.');
    }

    public function edit($id)
    {
        $faq = faq::findorFail($id);
        return view('backend.faqs.create', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'question'=>'nullable|max:400',
            'answer'=>'nullable',
            'publish_status' => 'nullable'
        ]);
        $input = $request->all();
        $input['publish_status'] = $request->publish_status??0;
        faq::findOrFail($id)->update($input);
        return redirect()->route('faq.index')->with('success', 'FAQ is updated successfully.');
    }

    public function destroy($id)
    {
        $faq = faq::findorFail($id);
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ is deleted successfully.');
    }
}
