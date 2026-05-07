<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeInfo;

class HomeInfoController extends Controller
{
    public function index()
    {
        $homeinfo = HomeInfo::first();
        return view('backend.homeinfo.index', compact('homeinfo'));
    }

    public function update(Request $request, $id)
    {
        $contact = HomeInfo::findOrFail($id);

        $contact->update([
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
