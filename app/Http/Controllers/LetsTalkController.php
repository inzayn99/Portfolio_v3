<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LetsTalk;

class LetsTalkController extends Controller
{
    public function index()
    {
        $lets = LetsTalk::first();
        return view('backend.lets-talk.index', compact('lets'));
    }

    public function update(Request $request, $id)
    {
        $lets = LetsTalk::findOrFail($id);

        $lets->update([
            'image'       => $request->input('image'),
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => 'Successfully updated.']);
        }

        return redirect()->back()->with('success', 'Successfully updated.');
    }
}
