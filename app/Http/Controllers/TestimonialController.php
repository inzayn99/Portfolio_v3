<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function index()
    {
        //
        $testimonials = Testimonial::latest()->paginate(100);
        return view('backend.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        //
        return view('backend.testimonial.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:250',
            'degree'=>'required|max:250',
            'message'=>'required|max:2000',
            'rating'=>'nullable',
            'active' => 'nullable',
        ]);
        $input = $request->all();
        $input['publish_status'] = $request->active??0;
        Testimonial::create($input);
        return redirect()->route('testimonial.index')->with('success', 'Testimonial is created successfully.');
    }

    public function show(Testimonial $testimonial)
    {
        //
    }

    public function edit($id)
    {
        //
        $testimonial = Testimonial::findorfail($id);
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        //
        $testimonial = Testimonial::findorfail($id);
        $this->validate($request, [
            'name'=>'required|max:250',
            'degree'=>'required|max:250',
            'message'=>'required',
            'rating'=>'nullable',
            'active' => 'nullable'
        ]);

        $testimonial->update([
            'name'=>$request['name'],
            'degree'=>$request['digree'],
            'rating'=>$request['rating'],
            'image' => $request->image,
            'message'=>$request['message'],
            'publish_status' => $request->active??0
        ]);
        $testimonial->save();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial is updated successfully.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return response()->json(['success' => true, 'message' => 'Testimonial deleted successfully.']);
    }

}
