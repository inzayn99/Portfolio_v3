<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Str;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::latest()->paginate(10);
        return view('backend.about.index', compact('about'));
    }


    public function create()
    {
        return view('backend.about.create');
    }


    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title'    => 'required',
        //     'sub_title'    => 'nullable',
        //     'description'    => 'nullable',
        //     'amenities'    => 'nullable',
        //     'nearby'    => 'nullable',
        //     'video'    => 'nullable',
        //     'guest_policies'    => 'nullable',
        //     'image' => 'nullable|string|max:250',
        //     'publish_status'=>'nullable'
        // ]);

        // $input = $request->all();
        // $input['publish_status']=$request->publish_status?? 0;
        // $input['slug'] = Str::slug($request->title);
        // About::create($input);
        // return redirect()->route('about.index')->with('success', 'About information saved successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $about = About::findorFail($id);
        return view('backend.about.create', compact('about'));
    }

    public function update(Request $request, $id)
    {

        // return $request->all();
        $input = $request->all();
        $input['publish_status'] = $request->publish_status??0;
        $input['title_slug'] = str_slug($request->title);
        $about = About::findorFail($id);
        $about->update($input);

        return redirect('admin/about/'.$id.'/edit')->with('success', 'About has been updated successfully.');
        // return $this->edit($id);
    }

    public function destroy($id)
    {
        //  About::findorFail($id)->delete();
        // return redirect()->route('about.index')->with('success', 'About information has been deleted successfully.');
    }
}
