<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsCategory;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $news = NewsCategory::latest()->paginate(10);
        return view('backend.news-category.index', compact('news'));
    }

    public function create()
    {
        return view('backend.news-category.create');

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
        NewsCategory::create($input);

        return redirect()->route('news-category.index')->with('success', 'News category is created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $news = NewsCategory::findorFail($id);
        return view('backend.news-category.create', compact('news'));
    }

    public function update(Request $request, $id)
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
        NewsCategory::findOrFail($id)->update($input);
        return redirect()->route('news-category.index')->with('success', 'News category has been updated successfully.');
    }


    public function destroy($id)
    {
        $newsCategory = NewsCategory::findOrFail($id);
        $newsCategory->delete();

        return response()->json(['success' => true, 'message' => 'News Category deleted successfully.']);
    }

}
