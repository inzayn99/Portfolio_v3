<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(100);
        return view('backend.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.sliders.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'nullable|max:200',
            'sub_title' => 'nullable|max:200',
            'slider_image' => 'required|string|max:250',
            'active' => 'nullable'
        ]);

        $slider = explode(',', $request->slider_image);
        $input = $request->all();
        $input['is_active'] = $request->active ?? 0;
        foreach ($slider as $slide) {
            $input['location'] = $slide;
            Slider::create($input);
        }

        return response()->json(['success' => 'Slider is created successfully.']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::findorFail($id);
        return view('backend.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
{
    $this->validate($request, [
        'title'=>'nullable|max:200',
        'sub_title'=>'nullable|max:200',
        'slider_image' => 'nullable|string|max:250',
        'active' => 'nullable'
    ]);
    $input = $request->all();
    $input['location'] = $request->slider_image;
    $input['is_active'] = $request->active??0;
    Slider::findOrFail($id)->update($input);
    return redirect()->route('slider.index')->with('success', 'Slider is updated successfully.');

}

    public function destroy($id)
    {
        $existing_slider = Slider::findorFail($id);
        Storage::disk('uploads')->delete($existing_slider->location);
        $existing_slider->delete();

        // return redirect()->route('slider.index')->with('success', 'Slider is deleted successfully.');
        return response()->json(['success' => true, 'message' => 'Slider deleted successfully.']);

    }
}
