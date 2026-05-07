<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;


class ResumeController extends Controller
{
    public function index()
    {
        $info = Resume::first();
        return view('backend.resume.information', compact('info'));
    }

    public function update(Request $request, $id)
    {
        $info = Resume::findOrFail($id);

        $info->update([
            'cover'       => $request->input('cover'),
            'small_cover' => $request->input('small_cover'),
            'experience'  => $request->input('experience'),
            'heading'     => $request->input('heading'),
            'title'       => $request->input('title'),
            'description' => $request->input('description'),

        ]);

        if ($request->ajax()) {
            return response()->json(['success' => 'Successfully updated.']);
        }

        return redirect()->back()->with('success', 'Successfully updated.');
    }
}

