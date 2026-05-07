<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogAuthors;
use Illuminate\Support\Str;

class BlogAuthorsController extends Controller
{
    public function index()
    {
        $authors = BlogAuthors::latest()->paginate(100);
        return view('backend.blog-authors.index', compact('authors'));
    }

    public function create()
    {
        return view('backend.blog-authors.create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'whatsapp' => 'nullable',
            'phone' => 'nullable',
            'addres' => 'nullable',
            'email' => 'nullable',
            'description'    => 'nullable',
            'image' => 'nullable|string|max:250',
            'publish_status'=>'nullable'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->name);
        BlogAuthors::create($input);

        return redirect()->route('authors.index')->with('success', 'author is created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $author = BlogAuthors::findorFail($id);
        return view('backend.blog-authors.create', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'    => 'required',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'whatsapp' => 'nullable',
            'phone' => 'nullable',
            'addres' => 'nullable',
            'email' => 'nullable',
            'description'    => 'nullable',
            'image' => 'nullable|string|max:250',
            'publish_status'=>'nullable'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->name);
        BlogAuthors::findOrFail($id)->update($input);
        return redirect()->route('authors.index')->with('success', 'Author has been updated successfully.');
    }

    public function destroy($id)
    {
        $authors = BlogAuthors::findOrFail($id);
        $authors->delete();

        return response()->json(['success' => true, 'message' => 'Authors deleted successfully.']);
    }
}
