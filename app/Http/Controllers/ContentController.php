<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            // dd($request->search);
            $content = Content::where('content_title','LIKE','%'.$request->search.'%')
            ->orWhere('content_type','LIKE','%'.$request->search.'%')->latest()->get();
            return view('backend.content.searchAjax', compact('content'));

        }
        $content = Content::latest()->where('delete_status', '0')->paginate(10);
        return view('backend.content.index', compact('content'));
    }

    public function create()
    {
        $contentTypes = Content::contentType;
        // return $contentTypes;
        return view('backend.content.create',compact('contentTypes'));
    }

    public function store(Request $request)
    {
        //  return $request->all();
        $data = $this->validate($request, [
            // 'featured_img' => 'nullable|string|max:250',
            // 'freezone_img' => 'nullable|string|max:250',
            // 'content_body' => 'nullable',
            // 'content_title' => 'nullable',

            'img_one' => 'nullable|string|max:250',
            'title_one' => 'nullable',
            'desc_one' => 'nullable',

            'img_two' => 'nullable|string|max:250',
            'title_two' => 'nullable',
            'desc_two' => 'nullable',

        ]);
        $input = $request->all();
        // return $input;

        $input['show_on_menu'] = 'N';
        $input['publish_status'] = $request->publish_status??0;

        $input['content_url'] = Str::slug($request['title_one']);
        $contents = Content::create($input);

        return redirect()->route('content.index')->with('success', 'Content Successfully Created');
    }

    public function show(Content $content)
    {
        //
    }

    public function edit($id)
    {

        $content = Content::findorfail($id);
        $contentTypes = Content::contentType;
        return view('backend.content.edit', compact('content','contentTypes'));
    }

    public function update(Request $request,$id)
    {
        $contents = Content::findorfail($id);
        $this->validate($request, [
            // 'featured_img' => 'nullable|string|max:250',
            // 'freezone_img' => 'nullable|string|max:250',
            // 'content_body' => 'nullable',
            // 'content_title' => 'nullable',
            'content_type'=>'required',
            // 'description'=>'required',

            'img_one' => 'nullable|string|max:250',
            'title_one' => 'nullable',
            'desc_one' => 'nullable',

            'img_two' => 'nullable|string|max:250',
            'title_two' => 'nullable',
            'desc_two' => 'nullable',

        ]);

        $contents->update([
            // 'featured_img' => $request->featured_img,
            // 'freezone_img' => $request->freezone_img,
            // 'content_title' => $request->content_title,
            // 'content_page_title' => $request->content_page_title,
            'content_type' => $request->content_type,
            'meta_description' => $request->meta_description,
            'content_url' => Str::slug($request['content_title']),
            // 'content_body' => $request->content_body,
            'meta_keywords' => $request->meta_keywords,
            'publish_status' => $request->publish_status??0,
            'show_on_menu' => $request->show_on_menu??'N',
            'meta_title' => $request->meta_title,
            'external_link' => $request->external_link,
            'delete_status' => '0',

            'img_one' => $request->img_one,
            'title_one' => $request->title_one,
            'desc_one' => $request->desc_one,

            'img_two' => $request->img_two,
            'title_two' => $request->title_two,
            'desc_two' => $request->desc_two,

        ]);
        $contents->save();
        return redirect()->route('content.index')->with('success', 'Content Successfully Updated');
    }

    public function destroy($id)
    {
        $existing_content = Content::findorFail($id)->update([
            'delete_status' => '1'
        ]);
        return redirect()->route('content.index')->with('success', 'Content is deleted successfully.');
    }
}
