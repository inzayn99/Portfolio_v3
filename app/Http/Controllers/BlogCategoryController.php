<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $blogs = BlogCategory::withCount('blogs')->latest()->paginate(20);
        return view('backend.blog-category.index', compact('blogs'));
    }

    public function create()
    {
        return view('backend.blog-category.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'            => 'required',
            'description'      => 'nullable',
            'og_image'         => 'nullable|image|max:5120',
            'meta_title'       => 'nullable',
            'meta_keywords'    => 'nullable',
            'meta_description' => 'nullable',
            'publish_status'   => 'nullable',
        ]);

        $input = $request->except(['og_image']);
        $input['publish_status'] = $request->publish_status ?? 0;
        $input['slug'] = Str::slug($request->title);

        foreach (['og_image'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $name = time() . '_cat_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/categories'), $name);
                $input[$field] = 'uploads/categories/' . $name;
            }
        }

        BlogCategory::create($input);

        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'Category created successfully.']);
        }
        return redirect()->route('blog-category.index')->with('success', 'Category created successfully.');
    }

    public function show($id)
    {
        return response()->json(BlogCategory::findOrFail($id));
    }

    public function edit($id)
    {
        $blog = BlogCategory::findorFail($id);
        return view('backend.blog-category.index', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'            => 'required',
            'description'      => 'nullable',
            'og_image'         => 'nullable|image|max:5120',
            'meta_title'       => 'nullable',
            'meta_keywords'    => 'nullable',
            'meta_description' => 'nullable',
            'publish_status'   => 'nullable',
        ]);

        $input = $request->except(['og_image']);
        $input['publish_status'] = $request->publish_status ?? 0;
        $input['slug'] = Str::slug($request->title);

        foreach (['og_image'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $name = time() . '_cat_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/categories'), $name);
                $input[$field] = 'uploads/categories/' . $name;
            }
        }

        BlogCategory::findOrFail($id)->update($input);

        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'Category updated successfully.']);
        }
        return redirect()->route('blog-category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        BlogCategory::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Category deleted successfully.']);
    }
}
