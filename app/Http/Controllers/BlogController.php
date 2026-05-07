<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $cat = BlogCategory::latest()->get();
        $blogs = Blog::blog()->paginate(100);
        return view('backend.blogs.index', compact('blogs','cat'));
    }

    public function create()
    {
        $cat = BlogCategory::latest()->get();
        return view('backend.blogs.create',compact('cat'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'title'    => 'required',
            'description'    => 'required',
            'blog_category'=>'required|integer',
            'meta_title'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
            'blog_type'=>'required',
            'posted_by'=>'nullable|max:250'
        ]);
        // $image = $request->cover_image;
        // $explode = explode($image, )
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Blog::create($input);
        return redirect()->route('blogs.index')->with('success', 'Blog information is created successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findorFail($id);
        $cat = BlogCategory::latest()->get();
        // $types = json_decode($blog->blog_type);
        // return $types;
        return view('backend.blogs.create', compact('blog','cat'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'title'    => 'required',
            'description'    => 'required',
            'blog_category'=>'required|integer',
            'og_image' => 'nullable|string|max:250',
            'blog_type'=>'required',
            'posted_by'=>'nullable|max:255'
        ]);

        $input = $request->all();
        // $input['blog_type']= json_encode($request->blog_type);
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Blog::findOrFail($id)->update($input);
        return redirect()->route('blogs.index')->with('success', 'Updated successfully.');
    }


public function destroy($id)
{
    $blog = Blog::findOrFail($id);
    $blog->delete();

    return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
}
}
