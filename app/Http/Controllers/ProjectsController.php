<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\ProgrammingLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    public function index()
    {
        $project = Projects::with('programmingLanguages')->latest()->paginate(100);
        return view('backend.projects.index',compact('project'));
    }

    public function create()
    {
        $pro = ProgrammingLanguage::where('publish_status', 1)->latest()->get();
        return view('backend.projects.create',compact('pro'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'link' => 'nullable|string',
            'github_link' => 'nullable|string',
            'year' => 'nullable|string',
            'made_at' => 'nullable|string',
            'built_with' => 'nullable|array',
            'built_with.*' => 'exists:programming_languages,id',
            'title' => 'required',
            'description' => 'nullable',
            'meta_title' => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
            'og_image' => 'nullable|string|max:250',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status'] = $request->publish_status ?? 0;
        $input['shown_on_main'] = $request->shown_on_main ?? 0;
        $input['shown_on_gallery'] = $request->shown_on_gallery ?? 0;

        $project = Projects::create($input);

        // Attach programming languages
        if ($request->has('built_with')) {
            $project->programmingLanguages()->sync($request->built_with);
        }

        return redirect()->route('projects.index')->with('success', 'Project is created successfully.');
    }

    public function edit(string $id)
    {
        $pro = ProgrammingLanguage::where('publish_status', 1)->latest()->get();
        $project = Projects::with('programmingLanguages')->findOrFail($id);
        return view('backend.projects.create', compact('project','pro'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'link' => 'nullable|string|max:250',
            'github_link' => 'nullable|string',
            'year' => 'nullable|string',
            'made_at' => 'nullable|string',
            'built_with' => 'nullable|array',
            'built_with.*' => 'exists:programming_languages,id',
            'title' => 'required',
            'description' => 'nullable',
            'meta_title' => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
            'og_image' => 'nullable|string|max:250',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status'] = $request->publish_status ?? 0;
        $input['shown_on_main'] = $request->shown_on_main ?? 0;
        $input['shown_on_gallery'] = $request->shown_on_gallery ?? 0;

        $project = Projects::findOrFail($id);
        $project->update($input);

        // Sync programming languages
        if ($request->has('built_with')) {
            $project->programmingLanguages()->sync($request->built_with);
        } else {
            $project->programmingLanguages()->sync([]);
        }

        return redirect()->route('projects.index')->with('success', 'Updated successfully.');
    }

    public function destroy(string $id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();

        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
