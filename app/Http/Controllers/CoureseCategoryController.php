<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Storage;

class CoureseCategoryController extends Controller
{
    public function index()
    {
        $cats = CourseCategory::latest()->paginate(100);
        return view('backend.course-category.index', compact('cats'));
    }

    public function create()
    {
        return view('backend.course-category.create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required',
            'description'    => 'nullable',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' =>'nullable|string|max:250',
            'image' => 'nullable|string|max:250',
            'publish_status'=>'nullable'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->title);
        CourseCategory::create($input);

        return redirect()->route('course-category.index')->with('success', 'Course category is created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $course = CourseCategory::findorFail($id);
        return view('backend.course-category.create', compact('course'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title'    => 'required',
            'description'    => 'nullable',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' =>'nullable|string|max:250',
            'image' => 'nullable|string|max:250',
            'publish_status'=>'nullable'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->title);
        CourseCategory::findOrFail($id)->update($input);
        return redirect()->route('course-category.index')->with('success', 'Course category updated successfully.');
    }

    public function destroy(string $id)
    {
        $courseCat = CourseCategory::findOrFail($id);
        $courseCat->delete();
        return response()->json(['success' => true, 'message' => 'Course Category deleted successfully.']);
    }
}
