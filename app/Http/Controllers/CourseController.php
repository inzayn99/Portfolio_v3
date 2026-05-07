<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::first()->paginate(100);
        return view('backend.courses.index', compact('courses'));
    }

    public function create()
    {
         // dd('dsdsd');
         $cat = CourseCategory::latest()->get();
         return view('backend.courses.create',compact('cat'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'cover_image'    => 'nullable|string|max:250',
            'banner_image'   => 'nullable|string|max:250',
            'title'          => 'required',
            'description'    => 'required',
            'course_category'=>'required|integer',
            'show_on_menu'   =>'required|integer',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Course::create($input);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function show(string $id)
    {
         // dd($id);
         $course = Course::findOrFail($id);
         // return view('backend.courses.comment',compact('course'));
    }

    public function edit(string $id)
    {
        $course = Course::findorFail($id);
        $cat = CourseCategory::latest()->get();
        return view('backend.courses.create', compact('course','cat'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cover_image'    => 'nullable|string|max:250',
            'banner_image'   => 'nullable|string|max:250',
            'title'          => 'required',
            'description'    => 'required',
            'course_category'=>'required|integer',
            'show_on_menu'   =>'required|integer',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Course::findOrFail($id)->update($input);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return response()->json(['success' => true, 'message' => 'Course deleted successfully.']);
    }
}
