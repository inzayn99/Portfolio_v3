<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $cat = NewsCategory::latest()->get();
        $news = News::latest()->paginate(100);
        // return $news;
        return view('backend.news.index', compact('news','cat'));

    }

    public function create()
    {
        $cat = NewsCategory::latest()->get();
        return view('backend.news.create',compact('cat'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'title'    => 'required',
            'description'    => 'required',
            'news_category'=>'required|integer',
            // 'blog_authors'=>'required|integer',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
            'news_type'=>'required',
            'posted_by'=>'nullable|max:250'
        ]);
        // $image = $request->cover_image;
        // $explode = explode($image, )
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        News::create($input);
        return redirect()->route('news.index')->with('success', 'News information is created successfully.');
    }

    public function show($id)
    {
        // dd($id);
        // $blog = Blog::findOrFail($id);
        // return view('backend.blogs.comment',compact('blog'));
    }

    public function edit($id)
    {
        $news = News::findorFail($id);
        $cat = NewsCategory::latest()->get();
        return view('backend.news.create', compact('news','cat'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'title'    => 'required',
            'description'    => 'required',
            'news_category'=>'required|integer',
            // 'news_authors'=>'required|integer',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
            'news_type'=>'required',
            'posted_by'=>'nullable|max:255'
        ]);
                // return $request->posted_by;

        $input = $request->all();
        // $input['news_type']= json_encode($request->news_type);
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        News::findOrFail($id)->update($input);
        return redirect()->route('news.index')->with('success', 'News has been updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return response()->json(['success' => true, 'message' => 'News deleted successfully.']);
    }

}
