<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyProcedure;

class studyProcedureController extends Controller
{

    public function index()
    {
        $procedure = StudyProcedure::first();
        return view('backend.abroad-study-procedure.form', compact('procedure'));
    }


    public function update(Request $request, $id)
    {
        $procedure = StudyProcedure::findOrFail($id);

        $procedure->update([
            'img_one'      => $request->input('img_one'),
            'name_one'     => $request->input('name_one'),
            'slogan_one'   => $request->input('slogan_one'),
            'img_two'      => $request->input('img_two'),
            'name_two'     => $request->input('name_two'),
            'slogan_two'   => $request->input('slogan_two'),
            'img_three'    => $request->input('img_three'),
            'name_three'   => $request->input('name_three'),
            'slogan_three'  => $request->input('slogan_three'),
            'img_four'    => $request->input('img_four'),
            'name_four'   => $request->input('name_four'),
            'slogan_four'  => $request->input('slogan_four')
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => 'Successfully updated.']);
        }

        return redirect()->back()->with('success', 'Successfully updated.');
    }
}
