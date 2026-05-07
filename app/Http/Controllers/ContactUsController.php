<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = ContactUs::first();
        return view('backend.contact.information', compact('contacts'));
    }

    public function update(Request $request, $id)
    {
        $contact = ContactUs::findOrFail($id);

        $contact->update([
            'cover'       => $request->input('cover'),
            'title'       => $request->input('title'),
            'description' => $request->input('description'),

            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'freelance' => $request->input('freelance'),
            'slogan' => $request->input('slogan'),

        ]);

        if ($request->ajax()) {
            return response()->json(['success' => 'Successfully updated.']);
        }

        return redirect()->back()->with('success', 'Successfully updated.');
    }
}
