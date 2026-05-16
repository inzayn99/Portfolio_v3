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


    public function store(Request $request)
    {
        $this->validate($request, [
            'cover_image' => 'nullable|image|max:5120',
            'banner_image' => 'nullable|image|max:5120',
            'og_image'    => 'nullable|image|max:5120',
            'title'       => 'required',
            'description' => 'required',
            'blog_category' => 'required|integer',
            'meta_title'  => 'nullable',
            'blog_type'   => 'required',
            'posted_by'   => 'nullable|max:250',
        ]);

        $input = $request->except(['cover_image', 'banner_image', 'og_image']);
        $input['slug']           = Str::slug($request->title);
        $input['publish_status'] = $request->publish_status ?? 0;

        foreach (['cover_image', 'banner_image', 'og_image'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $name = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/blogs'), $name);
                $input[$field] = 'uploads/blogs/' . $name;
            }
        }

        Blog::create($input);

        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'Post created successfully.']);
        }
        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function show($id)
    {
        return response()->json(Blog::findOrFail($id));
    }

    public function edit($id)
    {
        $blog = Blog::findorFail($id);
        $cat = BlogCategory::latest()->get();
        return view('backend.blogs.create', compact('blog','cat'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cover_image'   => 'nullable|image|max:5120',
            'banner_image'  => 'nullable|image|max:5120',
            'og_image'      => 'nullable|image|max:5120',
            'title'         => 'required',
            'description'   => 'required',
            'blog_category' => 'required|integer',
            'blog_type'     => 'required',
            'posted_by'     => 'nullable|max:255',
        ]);

        $input = $request->except(['cover_image', 'banner_image', 'og_image']);
        $input['slug']           = Str::slug($request->title);
        $input['publish_status'] = $request->publish_status ?? 0;

        foreach (['cover_image', 'banner_image', 'og_image'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $name = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/blogs'), $name);
                $input[$field] = 'uploads/blogs/' . $name;
            }
        }

        Blog::findOrFail($id)->update($input);

        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'Post updated successfully.']);
        }
        return redirect()->route('blogs.index')->with('success', 'Updated successfully.');
    }


public function destroy($id)
{
    $blog = Blog::findOrFail($id);
    $blog->delete();

    return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
}
}
