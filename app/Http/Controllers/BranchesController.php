<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branches;
use Illuminate\Support\Str;

class BranchesController extends Controller
{

    public function index()
    {
        $branch = Branches::latest()->paginate(100);
        return view('backend.branch.index', compact('branch'));
    }

    public function create()
    {
         return view('backend.branch.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'          => 'required',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        Branches::create($input);

        return redirect()->route('branch.index')->with('success', 'Created successfully.');
    }

    public function edit(string $id)
    {
        $branch = Branches::findorFail($id);
        return view('backend.branch.create', compact('branch'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title'  => 'required',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        Branches::findOrFail($id)->update($input);
        return redirect()->route('branch.index')->with('success', 'Updated successfully.');
    }

    public function destroy(string $id)
    {
        $branch = Branches::findOrFail($id);
        $branch->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
